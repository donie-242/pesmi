<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'full_name',
        'nickname',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'religion',
        'address',
        'rt',
        'rw',
        'village',
        'district',
        'city',
        'province',
        'postal_code',
        'phone',
        'nisn',
        'previous_school',
        'previous_school_address',
        'father_name',
        'father_occupation',
        'father_phone',
        'father_education',
        'mother_name',
        'mother_occupation',
        'mother_phone',
        'mother_education',
        'guardian_name',
        'guardian_occupation',
        'guardian_phone',
        'photo',
        'birth_certificate',
        'family_card',
        'report_card',
        'status',
        'admin_notes',
        'submitted_at',
        'verified_at',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'submitted_at' => 'datetime',
            'verified_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isSubmitted(): bool
    {
        return $this->status !== 'draft';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isVerified(): bool
    {
        return $this->status === 'verified';
    }

    public function isAccepted(): bool
    {
        return $this->status === 'accepted';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    /**
     * Calculate biodata completion percentage.
     */
    public function getBiodataCompletionAttribute(): int
    {
        $requiredFields = [
            'full_name', 'gender', 'place_of_birth', 'date_of_birth',
            'religion', 'address', 'phone',
        ];

        $filled = collect($requiredFields)->filter(fn (string $field): bool => ! empty($this->{$field}))->count();

        return (int) round(($filled / count($requiredFields)) * 100);
    }

    /**
     * Calculate parent data completion percentage.
     */
    public function getParentCompletionAttribute(): int
    {
        $requiredFields = [
            'father_name', 'father_occupation', 'father_phone',
            'mother_name', 'mother_occupation', 'mother_phone',
        ];

        $filled = collect($requiredFields)->filter(fn (string $field): bool => ! empty($this->{$field}))->count();

        return (int) round(($filled / count($requiredFields)) * 100);
    }

    /**
     * Calculate document upload completion percentage.
     */
    public function getDocumentCompletionAttribute(): int
    {
        $documents = ['photo', 'birth_certificate', 'family_card', 'report_card'];
        $uploaded = collect($documents)->filter(fn (string $field): bool => ! empty($this->{$field}))->count();

        return (int) round(($uploaded / count($documents)) * 100);
    }

    /**
     * Overall registration completion percentage.
     */
    public function getOverallCompletionAttribute(): int
    {
        return (int) round(($this->biodata_completion + $this->parent_completion + $this->document_completion) / 3);
    }

    /**
     * Get the status label in Indonesian.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'draft' => 'Draft',
            'pending' => 'Menunggu Verifikasi',
            'verified' => 'Terverifikasi',
            'accepted' => 'Diterima',
            'rejected' => 'Ditolak',
            default => 'Tidak Diketahui',
        };
    }

    /**
     * Get the status color for UI badges.
     */
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'draft' => 'gray',
            'pending' => 'amber',
            'verified' => 'blue',
            'accepted' => 'emerald',
            'rejected' => 'rose',
            default => 'gray',
        };
    }
}
