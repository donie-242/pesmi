
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 16px;
            background: #f4f6fa;
            color: #263247;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 950px;
            margin: auto;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        h1 {
            font-size: 25px;
            margin: 0;
        }

        .back {
            text-decoration: none;
            color: #fff;
            background: #344767;
            padding: 11px 16px;
            border-radius: 8px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 14px;
            margin-bottom: 20px;
            box-shadow: 0 3px 15px rgba(0,0,0,.04);
        }

        h2 {
            font-size: 18px;
            margin: 0 0 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #eee;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .item small {
            display: block;
            color: #7b8495;
            margin-bottom: 7px;
        }

        .item strong {
            overflow-wrap: anywhere;
        }

        .full {
            grid-column: 1 / -1;
        }

        .badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            background: #fff3d6;
            color: #9a6700;
            font-size: 13px;
        }

        .documents a {
            display: inline-block;
            margin: 5px 0;
            color: #2563eb;
        }

        @media (max-width: 600px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .top {
                align-items: flex-start;
                flex-direction: column;
            }

            .card {
                padding: 18px;
            }
        }
        .result {
    padding: 18px;
    border-radius: 12px;
    margin-bottom: 20px;
}

.result h3 {
    margin: 0 0 8px;
}

.result p {
    margin: 0;
    line-height: 1.6;
}

.accepted {
    background: #dcfce7;
    color: #166534;
}

.rejected {
    background: #fee2e2;
    color: #991b1b;
}

.verified {
    background: #dbeafe;
    color: #1e40af;
}

.pending {
    background: #fef3c7;
    color: #92400e;
}

.draft {
    background: #f1f5f9;
    color: #475569;
}

.admin-note {
    padding-top: 15px;
    border-top: 1px solid #eee;
}

.admin-note p {
    margin-bottom: 0;
    color: #64748b;
    line-height: 1.6;
}
    </style>
</head>

<body>
<div class="container">

    <div class="top">
        <h1>Detail Pendaftaran</h1>

        <a href="{{ route('admin.registrations.index') }}" class="back">
            ← Kembali
        </a>
    </div>
    {{-- HASIL SELEKSI PPDB --}}
<div class="card">
    <h2>Hasil Seleksi PPDB</h2>

    @if ($registration->status === 'accepted')
        <div class="result accepted">
            <h3>🎉 Selamat! Kamu Diterima</h3>
            <p>Selamat, pendaftaran kamu dinyatakan diterima di MI Arrawiyah.</p>
        </div>

    @elseif ($registration->status === 'rejected')
        <div class="result rejected">
            <h3>Mohon Maaf</h3>
            <p>Mohon maaf, pendaftaran kamu belum dapat diterima.</p>
        </div>

    @elseif ($registration->status === 'verified')
        <div class="result verified">
            <h3>Berkas Terverifikasi</h3>
            <p>Berkas kamu sudah diverifikasi. Silakan menunggu pengumuman hasil seleksi.</p>
        </div>

    @elseif ($registration->status === 'pending')
        <div class="result pending">
            <h3>Menunggu Verifikasi</h3>
            <p>Pendaftaran kamu sedang diperiksa oleh pihak sekolah.</p>
        </div>

    @else
        <div class="result draft">
            <h3>Belum Mengirim Pendaftaran</h3>
            <p>Silakan lengkapi dan kirim formulir pendaftaran terlebih dahulu.</p>
        </div>
    @endif

    <div class="admin-note">
        <strong>Catatan dari Admin</strong>
        <p>{{ $registration->admin_notes ?: 'Belum ada catatan dari pihak sekolah.' }}</p>
    </div>
</div>

    <div class="card">
        <h2>Informasi Pendaftaran</h2>

        <div class="grid">
            <div class="item">
                <small>Status Pendaftaran</small>
                <span class="badge">{{ $registration->status_label }}</span>
            </div>

            <div class="item">
                <small>Email Akun</small>
                <strong>{{ $registration->user?->email ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Tanggal Mendaftar</small>
                <strong>{{ $registration->submitted_at?->format('d M Y H:i') ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>NISN</small>
                <strong>{{ $registration->nisn ?? '-' }}</strong>
            </div>
        </div>
    </div>

    <div class="card">
        <h2>Biodata Siswa</h2>

        <div class="grid">
            <div class="item">
                <small>Nama Lengkap</small>
                <strong>{{ $registration->full_name }}</strong>
            </div>

            <div class="item">
                <small>Nama Panggilan</small>
                <strong>{{ $registration->nickname ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Jenis Kelamin</small>
                <strong>{{ $registration->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}</strong>
            </div>

            <div class="item">
                <small>Agama</small>
                <strong>{{ $registration->religion }}</strong>
            </div>

            <div class="item">
                <small>Tempat, Tanggal Lahir</small>
                <strong>
                    {{ $registration->place_of_birth }},
                    {{ $registration->date_of_birth?->format('d M Y') ?? '-' }}
                </strong>
            </div>

            <div class="item">
                <small>Nomor HP</small>
                <strong>{{ $registration->phone ?? '-' }}</strong>
            </div>

            <div class="item full">
                <small>Alamat</small>
                <strong>{{ $registration->address }}</strong>
            </div>

            <div class="item">
                <small>RT / RW</small>
                <strong>{{ $registration->rt ?? '-' }} / {{ $registration->rw ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Desa / Kelurahan</small>
                <strong>{{ $registration->village ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Kecamatan</small>
                <strong>{{ $registration->district ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Kabupaten / Kota</small>
                <strong>{{ $registration->city ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Provinsi</small>
                <strong>{{ $registration->province ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Kode Pos</small>
                <strong>{{ $registration->postal_code ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Sekolah Asal</small>
                <strong>{{ $registration->previous_school ?? '-' }}</strong>
            </div>

            <div class="item full">
                <small>Alamat Sekolah Asal</small>
                <strong>{{ $registration->previous_school_address ?? '-' }}</strong>
            </div>
        </div>
    </div>

    <div class="card">
        <h2>Data Orang Tua</h2>

        <div class="grid">
            <div class="item">
                <small>Nama Ayah</small>
                <strong>{{ $registration->father_name }}</strong>
            </div>

            <div class="item">
                <small>Pekerjaan Ayah</small>
                <strong>{{ $registration->father_occupation ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Pendidikan Ayah</small>
                <strong>{{ $registration->father_education ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Nomor HP Ayah</small>
                <strong>{{ $registration->father_phone ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Nama Ibu</small>
                <strong>{{ $registration->mother_name }}</strong>
            </div>

            <div class="item">
                <small>Pekerjaan Ibu</small>
                <strong>{{ $registration->mother_occupation ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Pendidikan Ibu</small>
                <strong>{{ $registration->mother_education ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Nomor HP Ibu</small>
                <strong>{{ $registration->mother_phone ?? '-' }}</strong>
            </div>
        </div>
    </div>

    <div class="card">
        <h2>Data Wali</h2>

        <div class="grid">
            <div class="item">
                <small>Nama Wali</small>
                <strong>{{ $registration->guardian_name ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Pekerjaan Wali</small>
                <strong>{{ $registration->guardian_occupation ?? '-' }}</strong>
            </div>

            <div class="item">
                <small>Nomor HP Wali</small>
                <strong>{{ $registration->guardian_phone ?? '-' }}</strong>
            </div>
        </div>
    </div>

    <div class="card documents">
        <h2>Dokumen Pendaftaran</h2>

        @foreach ([
            'photo' => 'Foto Siswa',
            'birth_certificate' => 'Akta Kelahiran',
            'family_card' => 'Kartu Keluarga',
            'report_card' => 'Rapor',
        ] as $field => $label)

            <div class="item" style="margin-bottom: 15px">
                <small>{{ $label }}</small>

                @if ($registration->$field)
                    <a href="{{ asset('storage/' . $registration->$field) }}"
                       target="_blank">
                        Lihat {{ $label }}
                    </a>
                @else
                    <strong>Belum diunggah</strong>
                @endif
            </div>

        @endforeach
    </div>

    <div class="card">
        <h2>Catatan Admin</h2>

        <p>{{ $registration->admin_notes ?? 'Belum ada catatan admin.' }}</p>
    </div>

</div>
</body>
</html>
