<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    /**
     * Menampilkan form pendaftaran.
     */
    public function create(Request $request): View|RedirectResponse
    {
        $registration = $request->user()->registration;

        // Jika sudah pernah dikirim, tidak boleh mengisi ulang
        if ($registration && $registration->isSubmitted()) {
            return redirect()->route('pendaftaran.show');
        }

        return view('pendaftaran.create', [
            'registration' => $registration,
        ]);
    }

    /**
     * Menyimpan data pendaftaran.
     */
    public function store(Request $request): RedirectResponse
    {
        $action = $request->input('action', 'save');
        $isSubmit = $action === 'submit';

        $rules = [
            // Data siswa
            'full_name' => [$isSubmit ? 'required' : 'nullable', 'string', 'max:255'],
            'nickname' => ['nullable', 'string', 'max:100'],
            'gender' => [$isSubmit ? 'required' : 'nullable', 'in:L,P'],
            'place_of_birth' => [$isSubmit ? 'required' : 'nullable', 'string', 'max:255'],
            'date_of_birth' => [$isSubmit ? 'required' : 'nullable', 'date', 'before:today'],
            'religion' => [$isSubmit ? 'required' : 'nullable', 'string', 'max:50'],

            'address' => [$isSubmit ? 'required' : 'nullable', 'string'],
            'rt' => ['nullable', 'string', 'max:5'],
            'rw' => ['nullable', 'string', 'max:5'],
            'village' => ['nullable', 'string', 'max:100'],
            'district' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'province' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:10'],

            'phone' => ['nullable', 'string', 'max:20'],
            'nisn' => ['nullable', 'string', 'max:20'],

            'previous_school' => ['nullable', 'string', 'max:255'],
            'previous_school_address' => ['nullable', 'string'],

            // Data ayah
            'father_name' => [$isSubmit ? 'required' : 'nullable', 'string', 'max:255'],
            'father_occupation' => ['nullable', 'string', 'max:100'],
            'father_phone' => ['nullable', 'string', 'max:20'],
            'father_education' => ['nullable', 'string', 'max:50'],

            // Data ibu
            'mother_name' => [$isSubmit ? 'required' : 'nullable', 'string', 'max:255'],
            'mother_occupation' => ['nullable', 'string', 'max:100'],
            'mother_phone' => ['nullable', 'string', 'max:20'],
            'mother_education' => ['nullable', 'string', 'max:50'],

            // Data wali
            'guardian_name' => ['nullable', 'string', 'max:255'],
            'guardian_occupation' => ['nullable', 'string', 'max:100'],
            'guardian_phone' => ['nullable', 'string', 'max:20'],

            // Dokumen
            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'birth_certificate' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:4096',
            ],

            'family_card' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:4096',
            ],

            'report_card' => [
                'nullable',
                'file',
                'mimes:jpg,jpeg,png,pdf',
                'max:4096',
            ],
        ];

        $validated = $request->validate($rules);

        $registration = $request->user()->registration;

        /*
        |--------------------------------------------------------------------------
        | Upload dokumen
        |--------------------------------------------------------------------------
        */

        $fileFields = [
            'photo',
            'birth_certificate',
            'family_card',
            'report_card',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {

                // Hapus file lama jika ada
                if ($registration && $registration->{$field}) {
                    Storage::disk('public')->delete($registration->{$field});
                }

                $validated[$field] = $request->file($field)
                    ->store('pendaftaran/' . $request->user()->id, 'public');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Simpan data
        |--------------------------------------------------------------------------
        */

        $registration = $request->user()->registration()->updateOrCreate(
            [
                'user_id' => $request->user()->id,
            ],
            $validated
        );

        /*
        |--------------------------------------------------------------------------
        | Submit pendaftaran
        |--------------------------------------------------------------------------
        */

        if ($isSubmit) {
            $registration->update([
                'status' => 'pending',
                'submitted_at' => now(),
            ]);

            return Redirect::route('pendaftaran.show')
                ->with(
                    'success',
                    'Pendaftaran berhasil dikirim! Silakan tunggu verifikasi dari pihak sekolah.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Simpan sebagai draft
        |--------------------------------------------------------------------------
        */

        return Redirect::route('pendaftaran.show')
                 ->with('success', 'Data berhasil disimpan sebagai draft.');
    }

    /**
     * Menampilkan detail pendaftaran.
     */
    public function show(Request $request): View
    {
        $registration = $request->user()->registration;

        if (! $registration) {
            return view('pendaftaran.create', [
                'registration' => null,
            ]);
        }

        return view('pendaftaran.show', [
            'registration' => $registration,
        ]);
    }
    public function submit(Request $request): RedirectResponse
{
    $registration = $request->user()->registration;

    if (! $registration) {
        return Redirect::route('pendaftaran.create')
            ->with('error', 'Data pendaftaran belum tersedia.');
    }

    if ($registration->overall_completion < 100) {
        return Redirect::route('pendaftaran.show')
            ->with('error', 'Data pendaftaran belum lengkap 100%.');
    }

    $registration->update([
        'status' => 'pending',
        'submitted_at' => now(),
    ]);

    return Redirect::route('pendaftaran.show')
        ->with(
            'success',
            'Pendaftaran berhasil dikirim! Silakan tunggu verifikasi dari pihak sekolah.'
        );
}
}