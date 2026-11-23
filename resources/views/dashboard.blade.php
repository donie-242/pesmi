<x-app-layout>

    <div class="dashboard-wrapper">

        {{-- =========================
            SIDEBAR
        ========================== --}}
        <aside class="sidebar" id="sidebar">

            <div class="sidebar-brand">
                <div class="brand-icon">
                    <i data-lucide="graduation-cap"></i>
                </div>

                <div>
                    <h2>MI Ar-Rawiyah</h2>
                    <span>PPDB Online</span>
                </div>
            </div>

            <nav class="sidebar-menu">

                <a href="#beranda" class="sidebar-link active">
                    <i data-lucide="home"></i>
                    <span>Beranda</span>
                </a>

                <a href="#profil" class="sidebar-link">
                    <i data-lucide="school"></i>
                    <span>Profil Sekolah</span>
                </a>

                <a href="#visi-misi" class="sidebar-link">
                    <i data-lucide="target"></i>
                    <span>Visi & Misi</span>
                </a>

                <a href="#prestasi" class="sidebar-link">
                    <i data-lucide="trophy"></i>
                    <span>Prestasi</span>
                </a>

                <a href="#informasi" class="sidebar-link">
                    <i data-lucide="megaphone"></i>
                    <span>Informasi</span>
                </a>

                <a href="{{ route('pendaftaran.create') }}" class="sidebar-link">
                    <i data-lucide="clipboard-pen"></i>
                    <span>Pendaftaran</span>
                </a>

                <a href="{{ route('profile.edit') }}" class="sidebar-link">
                    <i data-lucide="user-round"></i>
                    <span>Profil Saya</span>
                </a>

            </nav>

            <div class="sidebar-bottom">

                <div class="sidebar-help">
                    <div class="help-icon">
                        <i data-lucide="circle-help"></i>
                    </div>

                    <div>
                        <strong>Butuh bantuan?</strong>
                        <span>Hubungi panitia PPDB</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="logout-button">
                        <i data-lucide="log-out"></i>
                        <span>Keluar</span>
                    </button>
                </form>

            </div>

        </aside>


        {{-- =========================
            MAIN CONTENT
        ========================== --}}
        <main class="main-content">

            {{-- MOBILE HEADER --}}
            <header class="mobile-header">

                <div class="mobile-brand">
                    <div class="mobile-brand-icon">
                        <i data-lucide="graduation-cap"></i>
                    </div>

                    <div>
                        <strong>MI Ar-Rawiyah</strong>
                        <span>PPDB Online</span>
                    </div>
                </div>

                <button type="button" class="mobile-menu-button" onclick="toggleSidebar()">
                    <i data-lucide="menu"></i>
                </button>

            </header>


            {{-- =========================
                TOP BAR
            ========================== --}}
            <div class="topbar">

                <div>
                    <span class="topbar-label">PORTAL PPDB</span>
                    <h1>Dashboard Peserta</h1>
                </div>

                <div class="user-box">

                    <div class="user-info">
                        <strong>{{ $user->name }}</strong>
                        <span>{{ $user->email }}</span>
                    </div>

                    <div class="user-avatar">
    @if ($user->profile_photo)
        <img
            src="{{ asset('storage/' . $user->profile_photo) }}"
            alt="Foto Profil"
        >
    @else
        {{ strtoupper(substr($user->name, 0, 1)) }}
    @endif
</div>

                    <a href="{{ route('profile.edit') }}" class="profile-button">
                        <i data-lucide="settings"></i>
                    </a>

                </div>

            </div>


            {{-- =========================
                HERO
            ========================== --}}
            <section id="beranda" class="hero-section">

                <div class="hero-image">
                   <img
                           src="{{ asset('images/foto.jpg.webp') }}"
                              alt="Kegiatan MI Ar-Rawiyah"
    >
                </div>

                <div class="hero-overlay"></div>

                <div class="hero-content">

                    <div class="hero-badge">
                        <i data-lucide="sparkles"></i>
                        PENERIMAAN PESERTA DIDIK BARU
                    </div>

                    <h2>
                        Selamat datang,
                        <span>{{ $user->name }}</span> 👋
                    </h2>

                    <p>
                        Mari mulai langkah baru bersama MI Ar-Rawiyah.
                        Lengkapi data pendaftaranmu dan jadilah bagian
                        dari keluarga besar kami.
                    </p>

                    <div class="hero-actions">

                        <a href="{{ route('pendaftaran.create') }}" class="primary-button">
                            <i data-lucide="arrow-right"></i>
                            Mulai Pendaftaran
                        </a>

                        <a href="#profil" class="secondary-button">
                            Kenali Sekolah
                        </a>

                    </div>

                </div>

            </section>


            {{-- =========================
                WELCOME MESSAGE
            ========================== --}}
            <section id="profil" class="intro-section">

                <div class="section-heading">
                    <span class="section-label">TENTANG KAMI</span>

                    <h2>
                        Awali Langkahmu
                        <span>Bersama Kami</span>
                    </h2>

                    <p>
                        MI Ar-Rawiyah hadir untuk mendampingi generasi muda
                        tumbuh menjadi pribadi yang berilmu, berakhlak,
                        dan memiliki semangat untuk meraih masa depan.
                    </p>
                </div>

                <div class="quote-card">

                    <div class="quote-icon">
                        <i data-lucide="quote"></i>
                    </div>

                    <div>
                        <p>
                            “Setiap langkah kecil hari ini adalah awal
                            dari masa depan yang besar.”
                        </p>

                        <span>— MI Ar-Rawiyah</span>
                    </div>

                </div>

            </section>


            {{-- =========================
                VISI MISI
            ========================== --}}
            <section id="visi-misi" class="section-block">

                <div class="section-title">
                    <div>
                        <span class="section-label">ARAH PENDIDIKAN</span>
                        <h2>Visi & Misi</h2>
                    </div>

                    <div class="title-icon">
                        <i data-lucide="target"></i>
                    </div>
                </div>

                <div class="vision-grid">

                    <div class="vision-card vision-main">

                        <div class="card-icon">
                            <i data-lucide="eye"></i>
                        </div>

                        <span>VISI</span>

                        <h3>
                            Menjadi lembaga pendidikan yang membentuk
                            generasi berilmu, berakhlak, dan berprestasi.
                        </h3>

                    </div>

                    <div class="mission-card">

                        <div class="card-icon">
                            <i data-lucide="heart-handshake"></i>
                        </div>

                        <span>MISI</span>

                        <ul>
                            <li>
                                <i data-lucide="check"></i>
                                <span>Menanamkan nilai keislaman dan akhlak mulia.</span>
                            </li>

                            <li>
                                <i data-lucide="check"></i>
                                <span>Mendorong semangat belajar dan berprestasi.</span>
                            </li>

                            <li>
                                <i data-lucide="check"></i>
                                <span>Mengembangkan potensi dan kreativitas siswa.</span>
                            </li>

                            <li>
                                <i data-lucide="check"></i>
                                <span>Menciptakan lingkungan belajar yang nyaman.</span>
                            </li>
                        </ul>

                    </div>

                </div>

            </section>


            {{-- =========================
                PRESTASI
            ========================== --}}
            <section id="prestasi" class="section-block">

                <div class="section-title">

                    <div>
                        <span class="section-label">KEBANGGAAN KAMI</span>
                        <h2>Prestasi & Potensi</h2>
                    </div>

                    <div class="title-icon">
                        <i data-lucide="trophy"></i>
                    </div>

                </div>

                <div class="achievement-grid">

                    <div class="achievement-card">
                        <div class="achievement-icon">
                            <i data-lucide="trophy"></i>
                        </div>

                        <strong>Prestasi Akademik</strong>

                        <p>
                            Mendukung siswa untuk terus berkembang
                            dalam bidang akademik.
                        </p>
                    </div>

                    <div class="achievement-card">
                        <div class="achievement-icon">
                            <i data-lucide="medal"></i>
                        </div>

                        <strong>Prestasi Non-Akademik</strong>

                        <p>
                            Memberikan ruang bagi siswa untuk
                            mengembangkan bakat dan minat.
                        </p>
                    </div>

                    <div class="achievement-card">
                        <div class="achievement-icon">
                            <i data-lucide="star"></i>
                        </div>

                        <strong>Karakter & Akhlak</strong>

                        <p>
                            Membentuk pribadi yang percaya diri,
                            mandiri, dan berakhlak.
                        </p>
                    </div>

                </div>

            </section>


            {{-- =========================
                STATUS PENDAFTARAN
            ========================== --}}
            <section id="informasi" class="registration-section">

                <div class="section-title">

                    <div>
                        <span class="section-label">PERKEMBANGANMU</span>
                        <h2>Status Pendaftaran</h2>
                    </div>

                    <div class="title-icon">
                        <i data-lucide="clipboard-check"></i>
                    </div>

                </div>

                @if ($registration)

                    @php
                        $statusClass = match ($registration->status) {
                            'accepted' => 'status-success',
                            'rejected' => 'status-danger',
                            'pending' => 'status-warning',
                            'verified' => 'status-info',
                            default => 'status-draft',
                        };

                        $statusIcon = match ($registration->status) {
                            'accepted' => 'circle-check',
                            'rejected' => 'circle-x',
                            'pending' => 'clock-3',
                            'verified' => 'badge-check',
                            default => 'file-edit',
                        };
                    @endphp

                    <div class="status-card {{ $statusClass }}">

                        <div class="status-left">

                            <div class="status-icon">
                                <i data-lucide="{{ $statusIcon }}"></i>
                            </div>

                            <div>
                                <span class="status-small">
                                    STATUS PENDAFTARAN
                                </span>

                                <h3>
                                    {{ $registration->status_label }}
                                </h3>

                                <p>
                                    @if ($registration->isAccepted())
                                        Selamat! Pendaftaran kamu telah diterima.
                                    @elseif ($registration->isRejected())
                                        Pendaftaran kamu perlu diperbaiki.
                                    @elseif ($registration->isPending())
                                        Data kamu sedang menunggu pemeriksaan admin.
                                    @elseif ($registration->isVerified())
                                        Data pendaftaran kamu sudah terverifikasi.
                                    @else
                                        Data pendaftaran masih dalam tahap pengisian.
                                    @endif
                                </p>
                            </div>

                        </div>

                        <a href="{{ route('pendaftaran.show') }}" class="outline-button">
                            Lihat Pendaftaran
                            <i data-lucide="arrow-up-right"></i>
                        </a>

                    </div>


                    {{-- PROGRESS --}}
                    <div class="progress-section">

                        <div class="progress-header">
                            <div>
                                <span class="section-label">PROGRESS</span>
                                <h3>Kelengkapan Pendaftaran</h3>
                            </div>

                            <strong>{{ $registration->overall_completion }}%</strong>
                        </div>

                        <div class="overall-progress">
                            <div
                                class="overall-progress-bar"
                                style="width: {{ $registration->overall_completion }}%"
                            ></div>
                        </div>

                        <div class="progress-grid">

                            <div class="progress-card">
                                <div class="progress-card-top">
                                    <div class="progress-small-icon blue">
                                        <i data-lucide="user"></i>
                                    </div>

                                    <strong>
                                        {{ $registration->biodata_completion }}%
                                    </strong>
                                </div>

                                <h4>Data Diri</h4>
                                <span>Identitas siswa</span>

                                <div class="mini-progress">
                                    <div style="width: {{ $registration->biodata_completion }}%"></div>
                                </div>
                            </div>


                            <div class="progress-card">
                                <div class="progress-card-top">
                                    <div class="progress-small-icon purple">
                                        <i data-lucide="users"></i>
                                    </div>

                                    <strong>
                                        {{ $registration->parent_completion }}%
                                    </strong>
                                </div>

                                <h4>Data Orang Tua</h4>
                                <span>Informasi keluarga</span>

                                <div class="mini-progress">
                                    <div style="width: {{ $registration->parent_completion }}%"></div>
                                </div>
                            </div>


                            <div class="progress-card">
                                <div class="progress-card-top">
                                    <div class="progress-small-icon green">
                                        <i data-lucide="files"></i>
                                    </div>

                                    <strong>
                                        {{ $registration->document_completion }}%
                                    </strong>
                                </div>

                                <h4>Dokumen</h4>
                                <span>Berkas pendaftaran</span>

                                <div class="mini-progress">
                                    <div style="width: {{ $registration->document_completion }}%"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                @else

                    {{-- BELUM MENDAFTAR --}}
                    <div class="empty-registration">

                        <div class="empty-icon">
                            <i data-lucide="clipboard-pen"></i>
                        </div>

                        <span class="section-label">BELUM MEMULAI</span>

                        <h3>
                            Yuk, Mulai Pendaftaranmu!
                        </h3>

                        <p>
                            Lengkapi data diri, data orang tua,
                            dan dokumen untuk memulai proses pendaftaran.
                        </p>

                        <a href="{{ route('pendaftaran.create') }}" class="primary-button">
                            Mulai Pendaftaran
                            <i data-lucide="arrow-right"></i>
                        </a>

                    </div>

                @endif

            </section>


            {{-- =========================
                INFO PPDB
            ========================== --}}
            <section class="info-section">

                <div class="info-heading">

                    <div class="info-icon">
                        <i data-lucide="info"></i>
                    </div>

                    <div>
                        <span class="section-label">INFORMASI</span>
                        <h2>Perhatikan Sebelum Mendaftar</h2>
                    </div>

                </div>

                <div class="info-list">

                    <div class="info-item">
                        <span>01</span>
                        <p>Isi data sesuai dengan dokumen resmi.</p>
                    </div>

                    <div class="info-item">
                        <span>02</span>
                        <p>Pastikan nomor HP yang digunakan masih aktif.</p>
                    </div>

                    <div class="info-item">
                        <span>03</span>
                        <p>Upload dokumen dengan foto atau scan yang jelas.</p>
                    </div>

                    <div class="info-item">
                        <span>04</span>
                        <p>Periksa kembali data sebelum mengirim pendaftaran.</p>
                    </div>

                </div>

            </section>


            {{-- =========================
                FOOTER
            ========================== --}}
            <footer class="dashboard-footer">

                <div>
                    <strong>MI Ar-Rawiyah</strong>
                    <span>Portal Penerimaan Peserta Didik Baru</span>
                </div>

                <span>
                    © {{ date('Y') }} MI Ar-Rawiyah
                </span>

            </footer>

        </main>

    </div>


    {{-- =========================
        STYLE
    ========================== --}}
    <style>

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f6f8fc;
            color: #172033;
        }

        .dashboard-wrapper {
            min-height: 100vh;
            display: flex;
            background: #f6f8fc;
        }

        /* =========================
           SIDEBAR
        ========================== */

        .sidebar {
            width: 260px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 50;
            padding: 25px 18px;
            background: #ffffff;
            border-right: 1px solid #e9edf5;
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 4px 10px 30px;
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #2563eb, #4f8cff);
            color: white;
            box-shadow: 0 10px 25px rgba(37, 99, 235, .20);
        }

        .brand-icon svg {
            width: 23px;
        }

        .sidebar-brand h2 {
            margin: 0;
            font-size: 15px;
            font-weight: 800;
        }

        .sidebar-brand span {
            display: block;
            margin-top: 3px;
            font-size: 11px;
            color: #98a2b3;
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 13px;
            border-radius: 12px;
            text-decoration: none;
            color: #697386;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .sidebar-link svg {
            width: 18px;
            height: 18px;
        }

        .sidebar-link:hover {
            color: #2563eb;
            background: #f1f6ff;
            transform: translateX(2px);
        }

        .sidebar-link.active {
            color: #2563eb;
            background: #edf4ff;
        }

        .sidebar-bottom {
            margin-top: auto;
        }

        .sidebar-help {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px;
            margin-bottom: 12px;
            background: #f8faff;
            border: 1px solid #e9effa;
            border-radius: 14px;
        }

        .help-icon {
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #e7f0ff;
            color: #2563eb;
        }

        .help-icon svg {
            width: 17px;
        }

        .sidebar-help strong {
            display: block;
            font-size: 11px;
        }

        .sidebar-help span {
            display: block;
            margin-top: 3px;
            font-size: 9px;
            color: #98a2b3;
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px;
            border: 1px solid #fee2e2;
            border-radius: 11px;
            background: #fff7f7;
            color: #ef4444;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .logout-button:hover {
            background: #feecec;
        }

        .logout-button svg {
            width: 16px;
        }


        /* =========================
           MAIN
        ========================== */

        .main-content {
            width: calc(100% - 260px);
            margin-left: 260px;
            min-height: 100vh;
            padding: 0 40px 40px;
        }

        .topbar {
            min-height: 92px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e8edf4;
            margin-bottom: 28px;
        }

        .topbar-label,
        .section-label {
            color: #2563eb;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .topbar h1 {
            margin: 5px 0 0;
            font-size: 20px;
            font-weight: 800;
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info {
            text-align: right;
        }

        .user-info strong {
            display: block;
            font-size: 12px;
        }

        .user-info span {
            display: block;
            margin-top: 3px;
            font-size: 10px;
            color: #98a2b3;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: linear-gradient(135deg, #2563eb, #4f8cff);
            color: white;
            font-size: 15px;
            font-weight: 800;
            box-shadow: 0 8px 20px rgba(37, 99, 235, .18);
        }

        .profile-button {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            color: #687386;
            background: white;
            border: 1px solid #e8edf4;
        }

        .profile-button:hover {
            color: #2563eb;
        }

        .profile-button svg {
            width: 17px;
        }


        /* =========================
           HERO
        ========================== */

        .hero-section {
            position: relative;
            min-height: 430px;
            overflow: hidden;
            border-radius: 26px;
            margin-bottom: 45px;
            background: #172033;
            box-shadow: 0 20px 50px rgba(31, 41, 55, .12);
        }

        .hero-image,
        .hero-overlay {
            position: absolute;
            inset: 0;
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 35%;
        }

        .hero-overlay {
            background:
                linear-gradient(
                    90deg,
                    rgba(10, 20, 38, .92) 0%,
                    rgba(10, 20, 38, .72) 38%,
                    rgba(10, 20, 38, .20) 100%
                );
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 650px;
            padding: 65px 55px;
            color: white;
        }

        .hero-badge {
            width: fit-content;
            display: flex;
            align-items: center;
            gap: 7px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.18);
            backdrop-filter: blur(10px);
            font-size: 9px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .hero-badge svg {
            width: 14px;
        }

        .hero-content h2 {
            margin: 22px 0 14px;
            font-size: clamp(30px, 4vw, 48px);
            line-height: 1.12;
            letter-spacing: -1.5px;
        }

        .hero-content h2 span {
            color: #78a9ff;
        }

        .hero-content p {
            max-width: 570px;
            margin: 0;
            color: rgba(255,255,255,.82);
            font-size: 14px;
            line-height: 1.8;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .primary-button,
        .secondary-button,
        .outline-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            text-decoration: none;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 700;
            transition: .2s;
        }

        .primary-button {
            padding: 13px 18px;
            color: white;
            background: #2563eb;
            box-shadow: 0 10px 25px rgba(37, 99, 235, .25);
        }

        .primary-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .primary-button svg {
            width: 16px;
        }

        .secondary-button {
            padding: 13px 18px;
            color: white;
            border: 1px solid rgba(255,255,255,.28);
            background: rgba(255,255,255,.10);
            backdrop-filter: blur(8px);
        }

        .secondary-button:hover {
            background: rgba(255,255,255,.18);
        }


        /* =========================
           SECTION
        ========================== */

        .intro-section {
            margin-bottom: 50px;
        }

        .section-heading {
            max-width: 720px;
        }

        .section-heading h2,
        .section-title h2,
        .info-heading h2 {
            margin: 8px 0 10px;
            font-size: 28px;
            letter-spacing: -.8px;
        }

        .section-heading h2 span {
            color: #2563eb;
        }

        .section-heading p {
            margin: 0;
            color: #778196;
            font-size: 13px;
            line-height: 1.8;
        }

        .quote-card {
            margin-top: 25px;
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px;
            border-radius: 17px;
            background: white;
            border: 1px solid #e8edf4;
        }

        .quote-icon {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #edf4ff;
            color: #2563eb;
        }

        .quote-icon svg {
            width: 20px;
        }

        .quote-card p {
            margin: 0 0 4px;
            font-size: 13px;
            font-weight: 700;
        }

        .quote-card span {
            color: #9aa3b3;
            font-size: 10px;
        }

        .section-block,
        .registration-section {
            margin-bottom: 50px;
            scroll-margin-top: 25px;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .section-title h2 {
            margin-bottom: 0;
        }

        .title-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #edf4ff;
            color: #2563eb;
        }

        .title-icon svg {
            width: 20px;
        }


        /* =========================
           VISI MISI
        ========================== */

        .vision-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .vision-card,
        .mission-card {
            min-height: 260px;
            padding: 28px;
            border-radius: 21px;
            border: 1px solid #e8edf4;
            background: white;
        }

        .vision-main {
            background: linear-gradient(145deg, #2563eb, #1747ad);
            color: white;
        }

        .vision-main .card-icon {
            background: rgba(255,255,255,.16);
        }

        .card-icon {
            width: 45px;
            height: 45px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #edf4ff;
            color: #2563eb;
        }

        .card-icon svg {
            width: 21px;
        }

        .vision-card > span,
        .mission-card > span {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            opacity: .7;
        }

        .vision-card h3 {
            max-width: 480px;
            margin: 15px 0 0;
            font-size: 22px;
            line-height: 1.5;
        }

        .mission-card ul {
            padding: 0;
            margin: 18px 0 0;
            list-style: none;
        }

        .mission-card li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 15px;
            color: #697386;
            font-size: 12px;
            line-height: 1.5;
        }

        .mission-card li svg {
            width: 16px;
            flex-shrink: 0;
            margin-top: 1px;
            color: #2563eb;
        }


        /* =========================
           PRESTASI
        ========================== */

        .achievement-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 17px;
        }

        .achievement-card {
            padding: 24px;
            border-radius: 19px;
            background: white;
            border: 1px solid #e8edf4;
            transition: .25s;
        }

        .achievement-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(30, 50, 90, .08);
        }

        .achievement-icon {
            width: 43px;
            height: 43px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #fff7df;
            color: #d49b00;
        }

        .achievement-icon svg {
            width: 20px;
        }

        .achievement-card strong {
            display: block;
            font-size: 13px;
        }

        .achievement-card p {
            margin: 8px 0 0;
            color: #8490a4;
            font-size: 11px;
            line-height: 1.7;
        }


        /* =========================
           STATUS
        ========================== */

        .status-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 25px;
            border-radius: 20px;
            border: 1px solid #e8edf4;
            background: white;
        }

        .status-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .status-icon {
            width: 50px;
            height: 50px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
        }

        .status-icon svg {
            width: 22px;
        }

        .status-success .status-icon {
            color: #16a34a;
            background: #eaf9ef;
        }

        .status-danger .status-icon {
            color: #dc2626;
            background: #fff0f0;
        }

        .status-warning .status-icon {
            color: #d97706;
            background: #fff7e6;
        }

        .status-info .status-icon {
            color: #2563eb;
            background: #edf4ff;
        }

        .status-draft .status-icon {
            color: #64748b;
            background: #f1f5f9;
        }

        .status-small {
            font-size: 9px;
            color: #9aa3b3;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .status-card h3 {
            margin: 5px 0;
            font-size: 17px;
        }

        .status-card p {
            margin: 0;
            color: #8490a4;
            font-size: 11px;
        }

        .outline-button {
            padding: 11px 14px;
            color: #2563eb;
            border: 1px solid #dce7fb;
            background: #f8faff;
        }

        .outline-button:hover {
            background: #edf4ff;
        }

        .outline-button svg {
            width: 15px;
        }


        /* =========================
           PROGRESS
        ========================== */

        .progress-section {
            margin-top: 18px;
            padding: 25px;
            border-radius: 20px;
            background: white;
            border: 1px solid #e8edf4;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .progress-header h3 {
            margin: 6px 0 0;
            font-size: 17px;
        }

        .progress-header > strong {
            color: #2563eb;
            font-size: 28px;
        }

        .overall-progress {
            height: 8px;
            margin: 20px 0;
            overflow: hidden;
            border-radius: 999px;
            background: #edf1f7;
        }

        .overall-progress-bar {
            height: 100%;
            border-radius: inherit;
            background: linear-gradient(90deg, #2563eb, #65a0ff);
        }

        .progress-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .progress-card {
            padding: 18px;
            border-radius: 16px;
            background: #fafbfe;
            border: 1px solid #edf0f5;
        }

        .progress-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .progress-card-top > strong {
            font-size: 13px;
        }

        .progress-small-icon {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
        }

        .progress-small-icon svg {
            width: 16px;
        }

        .progress-small-icon.blue {
            color: #2563eb;
            background: #eaf2ff;
        }

        .progress-small-icon.purple {
            color: #7c3aed;
            background: #f2eaff;
        }

        .progress-small-icon.green {
            color: #16a34a;
            background: #eaf9ef;
        }

        .progress-card h4 {
            margin: 14px 0 3px;
            font-size: 12px;
        }

        .progress-card span {
            font-size: 10px;
            color: #9aa3b3;
        }

        .mini-progress {
            height: 5px;
            margin-top: 14px;
            overflow: hidden;
            border-radius: 999px;
            background: #e9edf4;
        }

        .mini-progress div {
            height: 100%;
            border-radius: inherit;
            background: #2563eb;
        }


        /* =========================
           EMPTY
        ========================== */

        .empty-registration {
            padding: 55px 30px;
            text-align: center;
            border-radius: 22px;
            background: white;
            border: 1px solid #e8edf4;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 19px;
            color: #2563eb;
            background: #edf4ff;
        }

        .empty-icon svg {
            width: 28px;
        }

        .empty-registration h3 {
            margin: 9px 0;
            font-size: 22px;
        }

        .empty-registration p {
            max-width: 500px;
            margin: 0 auto 25px;
            color: #8993a6;
            font-size: 12px;
            line-height: 1.7;
        }


        /* =========================
           INFO
        ========================== */

        .info-section {
            padding: 28px;
            margin-bottom: 35px;
            border-radius: 22px;
            background: #172033;
            color: white;
        }

        .info-heading {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 25px;
        }

        .info-icon {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            color: #9bc0ff;
            background: rgba(255,255,255,.10);
        }

        .info-icon svg {
            width: 20px;
        }

        .info-heading h2 {
            margin: 5px 0 0;
            font-size: 20px;
        }

        .info-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px;
            border-radius: 13px;
            background: rgba(255,255,255,.06);
        }

        .info-item > span {
            color: #72a6ff;
            font-size: 11px;
            font-weight: 800;
        }

        .info-item p {
            margin: 0;
            color: rgba(255,255,255,.76);
            font-size: 11px;
        }


        /* =========================
           FOOTER
        ========================== */

        .dashboard-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5px;
            color: #98a2b3;
            font-size: 10px;
        }

        .dashboard-footer strong {
            display: block;
            color: #354052;
            font-size: 11px;
        }

        .dashboard-footer span {
            display: block;
            margin-top: 3px;
        }


        /* =========================
           MOBILE
        ========================== */

        .mobile-header {
            display: none;
        }

        @media (max-width: 1000px) {

            .sidebar {
                width: 230px;
            }

            .main-content {
                width: calc(100% - 230px);
                margin-left: 230px;
                padding-left: 25px;
                padding-right: 25px;
            }

            .vision-grid {
                grid-template-columns: 1fr;
            }

            .achievement-grid {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 760px) {

            .dashboard-wrapper {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
                transition: transform .25s ease;
                box-shadow: 10px 0 35px rgba(0,0,0,.08);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                width: 100%;
                margin-left: 0;
                padding: 0 16px 25px;
            }

            .mobile-header {
                height: 70px;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .mobile-brand {
                display: flex;
                align-items: center;
                gap: 9px;
            }

            .mobile-brand-icon {
                width: 38px;
                height: 38px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 11px;
                color: white;
                background: #2563eb;
            }

            .mobile-brand-icon svg {
                width: 19px;
            }

            .mobile-brand strong {
                display: block;
                font-size: 12px;
            }

            .mobile-brand span {
                display: block;
                margin-top: 2px;
                color: #98a2b3;
                font-size: 9px;
            }

            .mobile-menu-button {
                width: 40px;
                height: 40px;
                border: 1px solid #e8edf4;
                border-radius: 11px;
                background: white;
                color: #475569;
            }

            .mobile-menu-button svg {
                width: 19px;
            }

            .topbar {
                min-height: auto;
                padding-bottom: 20px;
                margin-bottom: 18px;
            }

            .topbar h1 {
                font-size: 18px;
            }

            .user-info {
                display: none;
            }

            .profile-button {
                display: none;
            }

            .hero-section {
                min-height: 510px;
                border-radius: 20px;
                margin-bottom: 35px;
            }

            .hero-content {
                padding: 40px 25px;
                display: flex;
                flex-direction: column;
                justify-content: flex-end;
                height: 100%;
            }

            .hero-overlay {
                background:
                    linear-gradient(
                        0deg,
                        rgba(10,20,38,.92) 0%,
                        rgba(10,20,38,.45) 65%,
                        rgba(10,20,38,.15) 100%
                    );
            }

            .hero-content h2 {
                font-size: 31px;
            }

            .hero-content p {
                font-size: 12px;
            }

            .hero-actions {
                flex-direction: column;
            }

            .secondary-button,
            .primary-button {
                width: 100%;
            }

            .section-heading h2,
            .section-title h2 {
                font-size: 23px;
            }

            .quote-card {
                align-items: flex-start;
            }

            .progress-grid,
            .info-list {
                grid-template-columns: 1fr;
            }

            .status-card {
                align-items: flex-start;
                flex-direction: column;
            }

            .outline-button {
                width: 100%;
            }

            .dashboard-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

        }

        /* =========================================================
   HERO FIX - DESKTOP
   ========================================================= */

@media (min-width: 1001px) {

    .hero-section {
        min-height: 390px;
        height: 390px;
        border-radius: 24px;
        overflow: hidden;
    }

    .hero-image {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .hero-image img {
        width: 100%;
        height: 100%;

        object-fit: cover;

        /*
         * Sedikit naik supaya bagian penting
         * dari foto tidak terlalu terpotong.
         */
        object-position: center 25%;
    }

    .hero-overlay {
        background:
            linear-gradient(
                90deg,
                rgba(10, 20, 38, .86) 0%,
                rgba(10, 20, 38, .68) 32%,
                rgba(10, 20, 38, .30) 58%,
                rgba(10, 20, 38, .08) 100%
            );
    }

    .hero-content {
        max-width: 570px;
        height: 100%;

        padding: 45px 50px;

        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .hero-badge {
        padding: 7px 11px;
        font-size: 8px;
    }

    .hero-content h2 {
        margin: 17px 0 12px;

        /*
         * Tidak lagi menggunakan clamp 48px.
         */
        font-size: 34px;
        line-height: 1.15;
        letter-spacing: -1px;
    }

    .hero-content h2 span {
        font-size: inherit;
    }

    .hero-content p {
        max-width: 470px;

        font-size: 13px;
        line-height: 1.7;
    }

    .hero-actions {
        margin-top: 22px;
        gap: 10px;
    }

    .primary-button,
    .secondary-button {
        font-size: 11px;
    }

    .primary-button {
        padding: 12px 16px;
    }

    .secondary-button {
        padding: 12px 16px;
    }
}


/* =========================================================
   LAPTOP BESAR
   ========================================================= */

@media (min-width: 1280px) {

    .hero-section {
        min-height: 400px;
        height: 400px;
    }

    .hero-image img {
        object-position: center 23%;
    }

    .hero-content {
        max-width: 600px;
        padding-left: 55px;
    }

    .hero-content h2 {
        font-size: 36px;
    }
}


//* =========================================================
   HERO - LAPTOP & HP
   Kecilkan teks + tombol dan turunkan posisi
   ========================================================= */


/* =========================
   LAPTOP / DESKTOP
   ========================= */
@media (min-width: 1001px) {

    .hero-content {
        justify-content: flex-end;
        padding: 40px 50px 38px;
    }

    .hero-content h2 {
        font-size: 30px;
        line-height: 1.15;
        margin: 14px 0 10px;
    }

    .hero-content p {
        font-size: 12px;
        line-height: 1.6;
        max-width: 450px;
    }

    .hero-actions {
        margin-top: 18px;
        gap: 9px;
    }

    .primary-button,
    .secondary-button {
        padding: 10px 14px;
        font-size: 10px;
    }
}


/* =========================================
   HERO HP - POSISI BENAR-BENAR KE BAWAH
   ========================================= */

@media (max-width: 760px) {

    .hero-content {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;

        display: flex;
        flex-direction: column;
        justify-content: flex-end;

        padding: 30px 25px 28px;
        box-sizing: border-box;
    }

    .hero-content h2 {
        font-size: 26px;
        line-height: 1.15;
        margin: 12px 0 9px;
    }

    .hero-content p {
        font-size: 11px;
        line-height: 1.6;
        max-width: 100%;
    }

    .hero-actions {
        margin-top: 16px;
        gap: 8px;
    }

    .primary-button,
    .secondary-button {
        padding: 10px 14px;
        font-size: 10px;
    }
}
/* =========================================================
   ANIMATION SYSTEM
   ========================================================= */

/* Semua section masuk dari bawah */
.intro-section,
.section-block,
.registration-section,
.info-section,
.dashboard-footer {
    animation: sectionReveal .8s ease both;
}

@keyframes sectionReveal {
    from {
        opacity: 0;
        transform: translateY(35px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* =========================================================
   HERO ANIMATION
   ========================================================= */

.hero-image img {
    animation: heroZoom 12s ease-in-out infinite alternate;
}

@keyframes heroZoom {
    from {
        transform: scale(1);
    }

    to {
        transform: scale(1.06);
    }
}


/* Hero badge */
.hero-badge {
    animation: heroBadge .7s ease-out both;
}

@keyframes heroBadge {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* Hero title */
.hero-content h2 {
    animation: heroTitle .8s .15s ease-out both;
}

@keyframes heroTitle {
    from {
        opacity: 0;
        transform: translateY(25px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* Hero description */
.hero-content p {
    animation: heroDescription .8s .3s ease-out both;
}

@keyframes heroDescription {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* Hero buttons */
.hero-actions {
    animation: heroButtons .8s .45s ease-out both;
}

@keyframes heroButtons {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* =========================================================
   CARD HOVER
   ========================================================= */

.visi-card,
.misi-card,
.prestasi-card,
.info-card,
.registration-card {
    transition:
        transform .3s ease,
        box-shadow .3s ease;
}

.visi-card:hover,
.misi-card:hover,
.prestasi-card:hover,
.info-card:hover,
.registration-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 18px 40px rgba(15, 23, 42, .12);
}


/* =========================================================
   BUTTON EFFECT
   ========================================================= */

.primary-button,
.secondary-button,
.profile-button {
    transition:
        transform .25s ease,
        box-shadow .25s ease;
}

.primary-button:hover,
.secondary-button:hover {
    transform: translateY(-3px);
}

.primary-button:active,
.secondary-button:active {
    transform: scale(.97);
}


/* =========================================================
   SIDEBAR MENU
   ========================================================= */

.sidebar-link {
    transition:
        transform .25s ease,
        background .25s ease,
        padding-left .25s ease;
}

.sidebar-link:hover {
    transform: translateX(5px);
}


/* =========================================================
   USER AVATAR
   ========================================================= */

.user-avatar {
    transition: transform .3s ease;
}

.user-avatar:hover {
    transform: rotate(-5deg) scale(1.08);
}


/* =========================================================
   SECTION HEADING
   ========================================================= */

.section-heading h2 {
    animation: headingSlide .7s ease both;
}

.section-heading p {
    animation: headingSlide .8s .15s ease both;
}

@keyframes headingSlide {
    from {
        opacity: 0;
        transform: translateX(-25px);
    }

    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.user-avatar {
    width: 42px;
    height: 42px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: linear-gradient(135deg, #2563eb, #4f8cff);
    color: white;
    font-size: 15px;
    font-weight: 800;
}

.user-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
/* =========================================================
   FOOTER
   ========================================================= */

.dashboard-footer {
    animation-delay: .2s;
}


/* =========================================================
   HP
   ========================================================= */

@media (max-width: 760px) {

    .hero-image img {
        animation-duration: 15s;
    }

    .primary-button:hover,
    .secondary-button:hover {
        transform: none;
    }

    .sidebar-link:hover {
        transform: none;
    }

    .visi-card:hover,
    .misi-card:hover,
    .prestasi-card:hover,
    .info-card:hover,
    .registration-card:hover {
        transform: translateY(-3px);
    }
}


/* =========================================================
   ACCESSIBILITY
   ========================================================= */

@media (prefers-reduced-motion: reduce) {

    *,
    *::before,
    *::after {
        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: .01ms !important;
        scroll-behavior: auto !important;
    }
}

    </style>


    {{-- =========================
        JAVASCRIPT
    ========================== --}}
    <script>

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');

            if (sidebar) {
                sidebar.classList.toggle('open');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {

            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            const sidebarLinks = document.querySelectorAll('.sidebar-link');

            sidebarLinks.forEach(function (link) {

                link.addEventListener('click', function () {

                    if (window.innerWidth <= 760) {

                        const sidebar = document.getElementById('sidebar');

                        if (sidebar) {
                            sidebar.classList.remove('open');
                        }

                    }

                });

            });

        });

    </script>

</x-app-layout>