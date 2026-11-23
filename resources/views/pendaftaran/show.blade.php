<x-app-layout>

    <style>
        .detail-page {
            min-height: 100vh;
            padding: 40px 20px 60px;
            background:
                radial-gradient(circle at 0% 0%, rgba(16, 185, 129, .08), transparent 30%),
                radial-gradient(circle at 100% 100%, rgba(59, 130, 246, .06), transparent 30%),
                #f8fafc;
        }

        .detail-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* =========================
           TOP STATUS
        ========================= */

        .status-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 26px;
            padding: 34px;
            text-align: center;
            box-shadow: 0 15px 45px rgba(15, 23, 42, .07);
            margin-bottom: 24px;
        }

        .status-icon {
            width: 72px;
            height: 72px;
            margin: 0 auto 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .status-icon.draft {
            background: #fef3c7;
            color: #d97706;
        }

        .status-icon.pending {
            background: #dbeafe;
            color: #2563eb;
        }

        .status-icon.accepted {
            background: #dcfce7;
            color: #16a34a;
        }

        .status-icon.rejected {
            background: #fee2e2;
            color: #dc2626;
        }

        .status-card h1 {
            margin: 0 0 8px;
            color: #0f172a;
            font-size: 28px;
            font-weight: 800;
        }

        .status-card > p {
            max-width: 650px;
            margin: 0 auto;
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 20px;
            padding: 9px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
        }

        .status-badge.draft {
            background: #fef3c7;
            color: #92400e;
        }

        .status-badge.pending {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-badge.accepted {
            background: #dcfce7;
            color: #15803d;
        }

        .status-badge.rejected {
            background: #fee2e2;
            color: #b91c1c;
        }

        .registration-number {
            margin-top: 24px;
            padding: 18px;
            border: 1px dashed #cbd5e1;
            border-radius: 16px;
            background: #f8fafc;
        }

        .registration-number small {
            display: block;
            color: #64748b;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .registration-number strong {
            color: #0f172a;
            font-size: 22px;
            letter-spacing: 1px;
        }

        /* =========================
           COMPLETION
        ========================= */

        .completion-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 22px;
            padding: 26px;
            margin-bottom: 24px;
            box-shadow: 0 8px 30px rgba(15, 23, 42, .05);
        }

        .completion-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 16px;
        }

        .completion-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .completion-icon {
            width: 44px;
            height: 44px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ecfdf5;
            color: #059669;
        }

        .completion-title h2 {
            margin: 0;
            color: #0f172a;
            font-size: 17px;
            font-weight: 800;
        }

        .completion-title span {
            display: block;
            margin-top: 3px;
            color: #94a3b8;
            font-size: 12px;
        }

        .completion-percent {
            color: #059669;
            font-size: 25px;
            font-weight: 800;
        }

        .progress-track {
            width: 100%;
            height: 11px;
            overflow: hidden;
            border-radius: 999px;
            background: #e2e8f0;
        }

        .progress-bar {
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #10b981, #34d399);
            transition: width .5s ease;
        }

        .completion-info {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            color: #64748b;
            font-size: 12px;
        }

        .completion-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 20px;
        }

        .completion-item {
            padding: 15px;
            border-radius: 15px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .completion-item-top {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 8px;
        }

        .completion-item strong {
            color: #334155;
            font-size: 13px;
        }

        .completion-item span {
            color: #059669;
            font-size: 12px;
            font-weight: 700;
        }

        .mini-progress {
            height: 6px;
            overflow: hidden;
            border-radius: 999px;
            background: #e2e8f0;
        }

        .mini-progress div {
            height: 100%;
            border-radius: inherit;
            background: #10b981;
        }

        /* =========================
           DETAIL CARDS
        ========================= */

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .detail-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 22px;
            padding: 26px;
            box-shadow: 0 8px 30px rgba(15, 23, 42, .05);
        }

        .detail-card.full {
            grid-column: 1 / -1;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 18px;
            margin-bottom: 18px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-title-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ecfdf5;
            color: #059669;
        }

        .card-title h2 {
            margin: 0;
            color: #0f172a;
            font-size: 17px;
            font-weight: 800;
        }

        .card-title span {
            display: block;
            margin-top: 2px;
            color: #94a3b8;
            font-size: 12px;
        }

        .info-list {
            display: grid;
            gap: 15px;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding-bottom: 13px;
            border-bottom: 1px solid #f1f5f9;
        }

        .info-item:last-child {
            padding-bottom: 0;
            border-bottom: none;
        }

        .info-label {
            color: #64748b;
            font-size: 13px;
        }

        .info-value {
            color: #0f172a;
            font-size: 14px;
            font-weight: 600;
            text-align: right;
        }

        /* =========================
           DOCUMENT
        ========================= */

        .document-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .document-item {
            padding: 18px;
            border-radius: 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            text-align: center;
        }

        .document-icon {
            width: 44px;
            height: 44px;
            margin: 0 auto 10px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dcfce7;
            color: #16a34a;
        }

        .document-item strong {
            display: block;
            color: #334155;
            font-size: 13px;
        }

        .document-item small {
            display: block;
            margin-top: 5px;
            color: #16a34a;
            font-size: 11px;
            font-weight: 600;
        }

        .document-item small.missing {
            color: #ef4444;
        }

        /* =========================
           ACTION
        ========================= */

        .action-card {
            margin-top: 24px;
            padding: 24px;
            border-radius: 22px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 8px 30px rgba(15, 23, 42, .05);
        }

        .action-message {
            margin-bottom: 18px;
            padding: 14px 16px;
            border-radius: 14px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
            font-size: 13px;
            line-height: 1.6;
        }

        .action-message.warning {
            background: #fffbeb;
            border-color: #fde68a;
            color: #92400e;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 44px;
            padding: 11px 20px;
            border-radius: 12px;
            border: none;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-primary {
            background: #0f172a;
            color: #ffffff;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 23, 42, .18);
        }

        .btn-secondary {
            background: #ffffff;
            color: #334155;
            border: 1px solid #cbd5e1;
        }

        .btn-secondary:hover {
            background: #f8fafc;
        }

        .btn-disabled {
            background: #cbd5e1;
            color: #64748b;
            cursor: not-allowed;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .detail-page {
                padding: 25px 14px 45px;
            }

            .status-card {
                padding: 25px 20px;
            }

            .status-card h1 {
                font-size: 23px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .detail-card.full {
                grid-column: auto;
            }

            .completion-grid {
                grid-template-columns: 1fr;
            }

            .document-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {

            .status-card {
                border-radius: 20px;
            }

            .status-icon {
                width: 62px;
                height: 62px;
            }

            .completion-header {
                align-items: flex-start;
            }

            .completion-percent {
                font-size: 21px;
            }

            .info-item {
                display: block;
            }

            .info-value {
                margin-top: 4px;
                text-align: left;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>


    <div class="detail-page">

        <div class="detail-container">

            {{-- =========================================
                 STATUS
            ========================================== --}}

            @php
                $status = $registration->status;

                $statusClass = match ($status) {
                    'draft' => 'draft',
                    'pending', 'verified' => 'pending',
                    'accepted' => 'accepted',
                    'rejected' => 'rejected',
                    default => 'draft',
                };

                $statusIcon = match ($status) {
                    'draft' => 'file-edit',
                    'pending' => 'clock-3',
                    'verified' => 'badge-check',
                    'accepted' => 'check-circle',
                    'rejected' => 'circle-x',
                    default => 'file-edit',
                };
            @endphp


            <div class="status-card">

                <div class="status-icon {{ $statusClass }}">
                    <i data-lucide="{{ $statusIcon }}" width="36"></i>
                </div>


                @if ($status === 'draft')

                    <h1>Data Pendaftaran Tersimpan</h1>

                    <p>
                        Data pendaftaran kamu berhasil disimpan sebagai draft.
                        Lengkapi seluruh data sebelum mengirim pendaftaran
                        kepada pihak sekolah.
                    </p>

                @elseif ($status === 'pending')

                    <h1>Pendaftaran Berhasil Dikirim</h1>

                    <p>
                        Data pendaftaran kamu sudah berhasil dikirim.
                        Silakan tunggu proses verifikasi dari pihak sekolah.
                    </p>

                @elseif ($status === 'verified')

                    <h1>Pendaftaran Telah Diverifikasi</h1>

                    <p>
                        Data pendaftaran kamu telah diverifikasi oleh pihak sekolah.
                    </p>

                @elseif ($status === 'accepted')

                    <h1>Selamat! Kamu Diterima</h1>

                    <p>
                        Pendaftaran kamu telah diterima oleh pihak sekolah.
                    </p>

                @elseif ($status === 'rejected')

                    <h1>Pendaftaran Ditolak</h1>

                    <p>
                        Pendaftaran kamu belum dapat diterima.
                        Silakan periksa catatan dari pihak sekolah.
                    </p>

                @endif


                <div class="status-badge {{ $statusClass }}">

                    <i
                        data-lucide="{{ $statusIcon }}"
                        width="15"
                    ></i>

                    {{ $registration->status_label }}

                </div>


                <div class="registration-number">

                    <small>Nomor Pendaftaran</small>

                    <strong>
                        PPDB-{{ date('Y') }}-{{ str_pad($registration->id, 4, '0', STR_PAD_LEFT) }}
                    </strong>

                </div>

            </div>


            {{-- =========================================
                 KELENGKAPAN
            ========================================== --}}

            @php
                $biodataCompletion = $registration->biodata_completion;
                $parentCompletion = $registration->parent_completion;
                $documentCompletion = $registration->document_completion;
                $overallCompletion = $registration->overall_completion;
            @endphp


            <div class="completion-card">

                <div class="completion-header">

                    <div class="completion-title">

                        <div class="completion-icon">
                            <i data-lucide="clipboard-check"></i>
                        </div>

                        <div>
                            <h2>Kelengkapan Pendaftaran</h2>

                            <span>
                                Pastikan seluruh data sudah lengkap
                            </span>
                        </div>

                    </div>

                    <div class="completion-percent">
                        {{ $overallCompletion }}%
                    </div>

                </div>


                <div class="progress-track">

                    <div
                        class="progress-bar"
                        style="width: {{ $overallCompletion }}%;"
                    ></div>

                </div>


                <div class="completion-info">

                    <span>
                        {{ $overallCompletion === 100 ? 'Data sudah lengkap' : 'Data belum lengkap' }}
                    </span>

                    <span>
                        {{ $overallCompletion }} dari 100%
                    </span>

                </div>


                <div class="completion-grid">

                    {{-- Biodata --}}
                    <div class="completion-item">

                        <div class="completion-item-top">

                            <strong>Data Siswa</strong>

                            <span>
                                {{ $biodataCompletion }}%
                            </span>

                        </div>

                        <div class="mini-progress">
                            <div style="width: {{ $biodataCompletion }}%;"></div>
                        </div>

                    </div>


                    {{-- Orang Tua --}}
                    <div class="completion-item">

                        <div class="completion-item-top">

                            <strong>Orang Tua</strong>

                            <span>
                                {{ $parentCompletion }}%
                            </span>

                        </div>

                        <div class="mini-progress">
                            <div style="width: {{ $parentCompletion }}%;"></div>
                        </div>

                    </div>


                    {{-- Dokumen --}}
                    <div class="completion-item">

                        <div class="completion-item-top">

                            <strong>Dokumen</strong>

                            <span>
                                {{ $documentCompletion }}%
                            </span>

                        </div>

                        <div class="mini-progress">
                            <div style="width: {{ $documentCompletion }}%;"></div>
                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================================
                 DATA SISWA + KONTAK
            ========================================== --}}

            <div class="detail-grid">


                {{-- Data Siswa --}}
                <div class="detail-card">

                    <div class="card-title">

                        <div class="card-title-icon">
                            <i data-lucide="user"></i>
                        </div>

                        <div>
                            <h2>Data Siswa</h2>
                            <span>Informasi calon siswa</span>
                        </div>

                    </div>


                    <div class="info-list">

                        <div class="info-item">
                            <span class="info-label">
                                Nama Lengkap
                            </span>

                            <span class="info-value">
                                {{ $registration->full_name ?: '-' }}
                            </span>
                        </div>


                        <div class="info-item">
                            <span class="info-label">
                                Nama Panggilan
                            </span>

                            <span class="info-value">
                                {{ $registration->nickname ?: '-' }}
                            </span>
                        </div>


                        <div class="info-item">
                            <span class="info-label">
                                Jenis Kelamin
                            </span>

                            <span class="info-value">
                                {{
                                    $registration->gender === 'L'
                                        ? 'Laki-laki'
                                        : ($registration->gender === 'P'
                                            ? 'Perempuan'
                                            : '-')
                                }}
                            </span>
                        </div>


                        <div class="info-item">
                            <span class="info-label">
                                Tempat, Tanggal Lahir
                            </span>

                            <span class="info-value">
                                {{ $registration->place_of_birth ?: '-' }},
                                {{ $registration->date_of_birth?->format('d/m/Y') ?? '-' }}
                            </span>
                        </div>


                        <div class="info-item">
                            <span class="info-label">
                                Agama
                            </span>

                            <span class="info-value">
                                {{ $registration->religion ?: '-' }}
                            </span>
                        </div>


                        <div class="info-item">
                            <span class="info-label">
                                NISN
                            </span>

                            <span class="info-value">
                                {{ $registration->nisn ?: '-' }}
                            </span>
                        </div>

                    </div>

                </div>


                {{-- Kontak --}}
                <div class="detail-card">

                    <div class="card-title">

                        <div class="card-title-icon">
                            <i data-lucide="map-pin"></i>
                        </div>

                        <div>
                            <h2>Kontak & Alamat</h2>
                            <span>Informasi tempat tinggal</span>
                        </div>

                    </div>


                    <div class="info-list">

                        <div class="info-item">
                            <span class="info-label">
                                No. HP
                            </span>

                            <span class="info-value">
                                {{ $registration->phone ?: '-' }}
                            </span>
                        </div>


                        <div class="info-item">
                            <span class="info-label">
                                Alamat
                            </span>

                            <span class="info-value">
                                {{ $registration->address ?: '-' }}
                            </span>
                        </div>


                        <div class="info-item">
                            <span class="info-label">
                                RT / RW
                            </span>

                            <span class="info-value">
                                {{ $registration->rt ?: '-' }}
                                /
                                {{ $registration->rw ?: '-' }}
                            </span>
                        </div>


                        <div class="info-item">
                            <span class="info-label">
                                Desa
                            </span>

                            <span class="info-value">
                                {{ $registration->village ?: '-' }}
                            </span>
                        </div>


                        <div class="info-item">
                            <span class="info-label">
                                Kecamatan
                            </span>

                            <span class="info-value">
                                {{ $registration->district ?: '-' }}
                            </span>
                        </div>


                        <div class="info-item">
                            <span class="info-label">
                                Kota / Kabupaten
                            </span>

                            <span class="info-value">
                                {{ $registration->city ?: '-' }}
                            </span>
                        </div>

                    </div>

                </div>


                {{-- =====================================
                     ORANG TUA
                ====================================== --}}

                <div class="detail-card full">

                    <div class="card-title">

                        <div class="card-title-icon">
                            <i data-lucide="users"></i>
                        </div>

                        <div>
                            <h2>Data Orang Tua</h2>
                            <span>Informasi orang tua / wali</span>
                        </div>

                    </div>


                    <div class="detail-grid">

                        <div class="info-list">

                            <div class="info-item">
                                <span class="info-label">
                                    Nama Ayah
                                </span>

                                <span class="info-value">
                                    {{ $registration->father_name ?: '-' }}
                                </span>
                            </div>


                            <div class="info-item">
                                <span class="info-label">
                                    Pekerjaan Ayah
                                </span>

                                <span class="info-value">
                                    {{ $registration->father_occupation ?: '-' }}
                                </span>
                            </div>


                            <div class="info-item">
                                <span class="info-label">
                                    No. HP Ayah
                                </span>

                                <span class="info-value">
                                    {{ $registration->father_phone ?: '-' }}
                                </span>
                            </div>

                        </div>


                        <div class="info-list">

                            <div class="info-item">
                                <span class="info-label">
                                    Nama Ibu
                                </span>

                                <span class="info-value">
                                    {{ $registration->mother_name ?: '-' }}
                                </span>
                            </div>


                            <div class="info-item">
                                <span class="info-label">
                                    Pekerjaan Ibu
                                </span>

                                <span class="info-value">
                                    {{ $registration->mother_occupation ?: '-' }}
                                </span>
                            </div>


                            <div class="info-item">
                                <span class="info-label">
                                    No. HP Ibu
                                </span>

                                <span class="info-value">
                                    {{ $registration->mother_phone ?: '-' }}
                                </span>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- =====================================
                     DOKUMEN
                ====================================== --}}

                <div class="detail-card full">

                    <div class="card-title">

                        <div class="card-title-icon">
                            <i data-lucide="files"></i>
                        </div>

                        <div>
                            <h2>Dokumen Pendaftaran</h2>
                            <span>Dokumen yang telah diunggah</span>
                        </div>

                    </div>


                    @php
                        $documents = [
                            'photo' => ['Foto', 'image'],
                            'birth_certificate' => ['Akta Kelahiran', 'file-text'],
                            'family_card' => ['Kartu Keluarga', 'users'],
                            'report_card' => ['Raport', 'book-open'],
                        ];
                    @endphp


                    <div class="document-grid">

                        @foreach ($documents as $field => [$label, $icon])

                            <div class="document-item">

                                <div class="document-icon">

                                    <i
                                        data-lucide="{{ $icon }}"
                                        width="20"
                                    ></i>

                                </div>


                                <strong>
                                    {{ $label }}
                                </strong>


                                @if ($registration->{$field})

                                    <small>
                                        ✓ Sudah diunggah
                                    </small>

                                @else

                                    <small class="missing">
                                        Belum diunggah
                                    </small>

                                @endif

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>


            {{-- =========================================
                 ACTION
            ========================================== --}}

            <div class="action-card">

                @if ($status === 'draft')

                    @if ($overallCompletion >= 100)

                        <div class="action-message">

                            <strong>🎉 Pendaftaran sudah lengkap!</strong>

                            <br>

                            Semua data siswa, orang tua, dan dokumen
                            sudah terisi. Kamu sekarang bisa mengirim
                            pendaftaran kepada pihak sekolah.

                        </div>

                    @else

                        <div class="action-message warning">

                            <strong>Data belum lengkap.</strong>

                            <br>

                            Lengkapi seluruh data terlebih dahulu.
                            Saat ini kelengkapan pendaftaran kamu
                            baru <strong>{{ $overallCompletion }}%</strong>.

                        </div>

                    @endif


                    <div class="action-buttons">

                        <a
                            href="{{ route('dashboard') }}"
                            class="btn btn-secondary"
                        >
                            <i data-lucide="layout-dashboard" width="17"></i>
                            Dashboard
                        </a>


                        <a
                            href="{{ route('pendaftaran.create') }}"
                            class="btn btn-secondary"
                        >
                            <i data-lucide="pencil" width="17"></i>
                            Edit Pendaftaran
                        </a>


                        @if ($overallCompletion >= 100)

                            <form
    method="POST"
    action="{{ route('pendaftaran.submit') }}"
    onsubmit="return confirm('Apakah kamu yakin ingin mengirim pendaftaran? Setelah dikirim, data akan masuk ke proses verifikasi sekolah.');"
>
    @csrf

    <button
        type="submit"
        class="btn btn-primary"
    >
        <i data-lucide="send" width="17"></i>
        Kirim Pendaftaran
    </button>
</form>
                        @else

                            <button
                                type="button"
                                class="btn btn-disabled"
                                disabled
                            >
                                <i data-lucide="lock" width="17"></i>
                                Kirim Pendaftaran
                            </button>

                        @endif

                    </div>


                @elseif ($status === 'pending')

                    <div class="action-message">

                        <strong>⏳ Pendaftaran sedang diproses.</strong>

                        <br>

                        Data kamu sudah dikirim dan sedang menunggu
                        verifikasi dari pihak sekolah.

                    </div>


                    <div class="action-buttons">

                        <a
                            href="{{ route('dashboard') }}"
                            class="btn btn-primary"
                        >
                            <i data-lucide="layout-dashboard" width="17"></i>
                            Kembali ke Dashboard
                        </a>

                    </div>


                @elseif ($status === 'rejected')

                    <div class="action-message warning">

                        <strong>Pendaftaran memerlukan perbaikan.</strong>

                        <br>

                        Silakan periksa catatan dari pihak sekolah
                        dan lakukan perbaikan pada data pendaftaran.

                    </div>


                    <div class="action-buttons">

                        <a
                            href="{{ route('pendaftaran.create') }}"
                            class="btn btn-primary"
                        >
                            <i data-lucide="pencil" width="17"></i>
                            Perbaiki Pendaftaran
                        </a>

                    </div>

                @else

                    <div class="action-buttons">

                        <a
                            href="{{ route('dashboard') }}"
                            class="btn btn-primary"
                        >
                            <i data-lucide="layout-dashboard" width="17"></i>
                            Kembali ke Dashboard
                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            lucide.createIcons();
        });
    </script>

</x-app-layout>