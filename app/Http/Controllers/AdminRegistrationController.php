<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminRegistrationController extends Controller
{
    public function index(Request $request): View
    {
        $query = Registration::with('user')
            ->latest();

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Pencarian nama siswa atau NISN
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('nisn', 'like', "%{$search}%");
            });
        }

        $registrations = $query
            ->paginate(10)
            ->withQueryString();

        return view('admin.registrations.index', compact('registrations'));
    }
    public function show(Registration $registration): View
{
    $registration->load('user');

    return view('admin.registrations.show', compact('registration'));
}
    
public function updateStatus(Request $request, Registration $registration)
{
    $validated = $request->validate([
        'status' => ['required', 'in:pending,verified,accepted,rejected'],
        'admin_notes' => ['nullable', 'string'],
    ]);

    $registration->update([
        'status' => $validated['status'],
        'admin_notes' => $validated['admin_notes'] ?? null,
        'verified_at' => in_array($validated['status'], [
            'verified',
            'accepted',
            'rejected',
        ]) ? now() : null,
    ]);

    return redirect()
        ->route('admin.registrations.index')
        ->with('success', 'Status pendaftaran berhasil diperbarui.');
}

}
