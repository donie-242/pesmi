<x-guest-layout>

    <div class="register-page">

        {{-- Background dekorasi --}}
        <div class="background-shape shape-one"></div>
        <div class="background-shape shape-two"></div>
        <div class="background-shape shape-three"></div>

        {{-- Card utama --}}
        <div class="register-card">

            {{-- =========================
                BAGIAN KIRI
            ========================== --}}
            <div class="register-info">

                <div class="floating-icon">
                    <i data-lucide="graduation-cap"></i>
                </div>

                <span class="badge-school">
                    <i data-lucide="sparkles" class="badge-icon"></i>
                    PPDB ONLINE
                </span>

                <h1>
                    Selamat Datang di
                    <span>MI Ar-Rawiyah</span>
                </h1>

                <p>
                    Daftarkan diri Anda sebagai calon peserta didik
                    dan mulai perjalanan pendidikan bersama kami.
                </p>

                {{-- Info --}}
                <div class="info-list">

                    <div class="info-item">
                        <div class="info-icon">
                            <i data-lucide="clipboard-list"></i>
                        </div>

                        <div>
                            <strong>Daftar Online</strong>
                            <small>Isi data pendaftaran dengan mudah</small>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i data-lucide="file-text"></i>
                        </div>

                        <div>
                            <strong>Lengkapi Dokumen</strong>
                            <small>Upload dokumen persyaratan</small>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i data-lucide="badge-check"></i>
                        </div>

                        <div>
                            <strong>Verifikasi</strong>
                            <small>Tunggu proses verifikasi sekolah</small>
                        </div>
                    </div>

                </div>

                <div class="school-footer">
                    <span class="pulse-dot"></span>
                    Sistem Pendaftaran Online
                </div>

            </div>


            {{-- =========================
                BAGIAN FORM
            ========================== --}}
            <div class="register-form">

                <div class="form-header">

                    <div class="mobile-logo">
                        <i data-lucide="graduation-cap"></i>
                    </div>

                    <h2>Buat Akun</h2>

                    <p>
                        Silakan isi data berikut untuk membuat akun
                        pendaftaran.
                    </p>

                </div>


                {{-- =========================
                    ERROR
                ========================== --}}
                @if ($errors->any())

                    <div class="alert-box error-alert">

                        <div class="alert-icon">
                            <i data-lucide="triangle-alert"></i>
                        </div>

                        <div>

                            <strong>Pendaftaran belum berhasil</strong>

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>

                    </div>

                @endif


                {{-- =========================
                    FORM
                ========================== --}}
                <form method="POST"
                    action="{{ route('register') }}"
                    id="registerForm">

                    @csrf


                    {{-- =========================
                        NAMA
                    ========================== --}}
                    <div class="input-group">

                        <label for="name">
                            Nama Lengkap
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                <i data-lucide="user"></i>
                            </span>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Masukkan nama lengkap"
                            >

                        </div>

                        @error('name')
                            <span class="field-error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- =========================
                        EMAIL
                    ========================== --}}
                    <div class="input-group">

                        <label for="email">
                            Email
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                <i data-lucide="mail"></i>
                            </span>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                placeholder="contoh@email.com"
                            >

                        </div>

                        @error('email')
                            <span class="field-error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- =========================
                        PASSWORD
                    ========================== --}}
                    <div class="input-group">

                        <label for="password">
                            Password
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                <i data-lucide="lock-keyhole"></i>
                            </span>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Buat password"
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('password', this)"
                                aria-label="Tampilkan password"
                            >
                                <i data-lucide="eye"></i>
                            </button>

                        </div>


                        {{-- Password strength --}}
                        <div class="password-strength">

                            <div class="strength-bar">
                                <span id="strengthProgress"></span>
                            </div>

                            <small id="strengthText">
                                Gunakan minimal 8 karakter
                            </small>

                        </div>


                        @error('password')
                            <span class="field-error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- =========================
                        KONFIRMASI PASSWORD
                    ========================== --}}
                    <div class="input-group">

                        <label for="password_confirmation">
                            Konfirmasi Password
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                <i data-lucide="shield-check"></i>
                            </span>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Ulangi password"
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('password_confirmation', this)"
                                aria-label="Tampilkan password"
                            >
                                <i data-lucide="eye"></i>
                            </button>

                        </div>

                    </div>


                    {{-- =========================
                        BUTTON
                    ========================== --}}
                    <button
                        type="submit"
                        class="register-button"
                        id="registerButton"
                    >

                        <span class="button-text">

                            <span>Buat Akun</span>

                            <i data-lucide="arrow-right"></i>

                        </span>


                        <span class="button-loading">

                            <span class="spinner"></span>

                            Memproses...

                        </span>

                    </button>

                </form>


                {{-- =========================
                    LOGIN
                ========================== --}}
                <div class="login-link">

                    Sudah punya akun?

                    <a href="{{ route('login') }}">
                        Masuk sekarang
                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
        POPUP
    ========================== --}}
    <div id="popup" class="popup">

        <div class="popup-box">

            <div class="popup-icon" id="popupIcon">

                <i data-lucide="check"></i>

            </div>

            <h3 id="popupTitle">
                Berhasil
            </h3>

            <p id="popupMessage">
                Data berhasil diproses.
            </p>

            <button onclick="closePopup()">
                Mengerti
            </button>

        </div>

    </div>


    {{-- =========================
        STYLE
    ========================== --}}
    <style>

        * {
            box-sizing: border-box;
        }


        /* =========================
            BODY
        ========================== */

        body {
             margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            }


        /* =========================
            PAGE
        ========================== */

        .register-page {

            min-height: 100vh;

            position: relative;

            overflow: hidden;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px 20px;

            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(99, 102, 241, .16),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(16, 185, 129, .14),
                    transparent 30%
                ),
                #f7f9fc;
        }


        /* =========================
            BACKGROUND
        ========================== */

        .background-shape {

            position: absolute;

            border-radius: 50%;

            filter: blur(1px);

            opacity: .7;

            animation: float 8s ease-in-out infinite;
        }


        .shape-one {

            width: 280px;

            height: 280px;

            background: rgba(99, 102, 241, .13);

            top: -100px;

            left: -80px;
        }


        .shape-two {

            width: 220px;

            height: 220px;

            background: rgba(16, 185, 129, .13);

            right: -60px;

            top: 20%;

            animation-delay: 2s;
        }


        .shape-three {

            width: 180px;

            height: 180px;

            background: rgba(245, 158, 11, .12);

            bottom: -70px;

            left: 30%;

            animation-delay: 4s;
        }


        @keyframes float {

            0%,
            100% {
                transform: translateY(0) scale(1);
            }

            50% {
                transform: translateY(-25px) scale(1.05);
            }

        }


        /* =========================
            CARD
        ========================== */

        .register-card {

            position: relative;

            z-index: 2;

            width: min(1050px, 100%);

            min-height: 650px;

            display: grid;

            grid-template-columns: 43% 57%;

            overflow: hidden;

            border-radius: 28px;

            background: rgba(255, 255, 255, .92);

            box-shadow:
                0 30px 80px rgba(15, 23, 42, .12),
                0 8px 25px rgba(15, 23, 42, .05);

            backdrop-filter: blur(15px);

            animation: cardAppear .7s ease;
        }


        @keyframes cardAppear {

            from {

                opacity: 0;

                transform:
                    translateY(25px)
                    scale(.98);

            }

            to {

                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);

            }

        }


        /* =========================
            LEFT
        ========================== */

        .register-info {

            padding: 55px 45px;

            color: white;

            position: relative;

            overflow: hidden;

            background:
                linear-gradient(
                    145deg,
                    #4f46e5,
                    #6366f1 55%,
                    #7c3aed
                );
        }


        .register-info::after {

            content: "";

            position: absolute;

            width: 250px;

            height: 250px;

            border-radius: 50%;

            border: 1px solid rgba(255,255,255,.15);

            right: -100px;

            bottom: -80px;
        }


        /* =========================
            FLOATING ICON
        ========================== */

        .floating-icon {

            width: 65px;

            height: 65px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 20px;

            background: rgba(255,255,255,.15);

            margin-bottom: 30px;

            animation:
                iconFloat 4s ease-in-out infinite;
        }


        .floating-icon svg {

            width: 32px;

            height: 32px;

            stroke-width: 1.8;
        }


        @keyframes iconFloat {

            0%,
            100% {
                transform:
                    translateY(0)
                    rotate(0);
            }

            50% {
                transform:
                    translateY(-8px)
                    rotate(3deg);
            }

        }


        /* =========================
            BADGE
        ========================== */

        .badge-school {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 7px 13px;

            border-radius: 30px;

            background: rgba(255,255,255,.15);

            font-size: 11px;

            letter-spacing: 1.5px;

            font-weight: 700;

            margin-bottom: 20px;
        }


        .badge-icon {

            width: 14px;

            height: 14px;

            stroke-width: 2;
        }


        /* =========================
            TITLE
        ========================== */

        .register-info h1 {

            font-size: clamp(30px, 4vw, 43px);

            line-height: 1.12;

            margin: 0 0 20px;

            letter-spacing: -1px;
        }


        .register-info h1 span {

            display: block;

            color: #e0e7ff;
        }


        .register-info > p {

            color: rgba(255,255,255,.78);

            line-height: 1.7;

            font-size: 14px;

            max-width: 390px;

            margin-bottom: 35px;
        }


        /* =========================
            INFO LIST
        ========================== */

        .info-list {

            display: flex;

            flex-direction: column;

            gap: 18px;
        }


        .info-item {

            display: flex;

            align-items: center;

            gap: 14px;

            transition: .3s;
        }


        .info-item:hover {

            transform: translateX(7px);
        }


        .info-icon {

            width: 42px;

            height: 42px;

            flex-shrink: 0;

            border-radius: 13px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: rgba(255,255,255,.13);
        }


        .info-icon svg {

            width: 19px;

            height: 19px;

            stroke-width: 2;
        }


        .info-item strong {

            display: block;

            font-size: 13px;
        }


        .info-item small {

            display: block;

            margin-top: 3px;

            color: rgba(255,255,255,.65);

            font-size: 11px;
        }


        /* =========================
            SCHOOL FOOTER
        ========================== */

        .school-footer {

            position: absolute;

            bottom: 30px;

            left: 45px;

            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 11px;

            color: rgba(255,255,255,.65);
        }


        .pulse-dot {

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: #86efac;

            box-shadow:
                0 0 0 5px
                rgba(134,239,172,.12);

            animation: pulse 2s infinite;
        }


        @keyframes pulse {

            50% {

                box-shadow:
                    0 0 0 9px
                    rgba(134,239,172,0);

            }

        }


        /* =========================
            FORM
        ========================== */

        .register-form {

            padding: 50px 60px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        .form-header {

            margin-bottom: 28px;
        }


        .mobile-logo {

            display: none;
        }


        .mobile-logo svg {

            width: 25px;

            height: 25px;

            stroke-width: 1.8;
        }


        .form-header h2 {

            margin: 0 0 8px;

            font-size: 30px;

            color: #111827;

            letter-spacing: -.8px;
        }


        .form-header p {

            margin: 0;

            color: #6b7280;

            font-size: 13px;
        }


        /* =========================
            INPUT
        ========================== */

        .input-group {

            margin-bottom: 18px;
        }


        .input-group label {

            display: block;

            margin-bottom: 7px;

            font-size: 12px;

            font-weight: 700;

            color: #374151;
        }


        .input-wrapper {

            position: relative;
        }


        .input-icon {

            position: absolute;

            left: 14px;

            top: 50%;

            transform: translateY(-50%);

            display: flex;

            align-items: center;

            justify-content: center;

            z-index: 2;

            color: #9ca3af;
        }


        .input-icon svg {

            width: 17px;

            height: 17px;

            stroke-width: 2;
        }


        .input-wrapper input {

            width: 100%;

            height: 49px;

            border: 1px solid #e5e7eb;

            border-radius: 13px;

            outline: none;

            padding: 0 45px;

            font-family:
                'Plus Jakarta Sans',
                Arial,
                sans-serif;

            font-size: 13px;

            color: #111827;

            background: #f9fafb;

            transition: .25s;
        }


        .input-wrapper input:focus {

            background: white;

            border-color: #6366f1;

            box-shadow:
                0 0 0 4px
                rgba(99,102,241,.09);
        }


        .input-wrapper input::placeholder {

            color: #9ca3af;
        }


        /* =========================
            PASSWORD TOGGLE
        ========================== */

        .password-toggle {

            position: absolute;

            right: 10px;

            top: 50%;

            transform: translateY(-50%);

            width: 32px;

            height: 32px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 0;

            background: transparent;

            color: #9ca3af;

            cursor: pointer;

            opacity: .65;

            transition: .2s;
        }


        .password-toggle:hover {

            opacity: 1;

            color: #4f46e5;
        }


        .password-toggle svg {

            width: 17px;

            height: 17px;

            stroke-width: 2;
        }


        /* =========================
            PASSWORD STRENGTH
        ========================== */

        .password-strength {

            margin-top: 7px;
        }


        .strength-bar {

            width: 100%;

            height: 4px;

            background: #e5e7eb;

            border-radius: 10px;

            overflow: hidden;
        }


        .strength-bar span {

            display: block;

            height: 100%;

            width: 0;

            border-radius: 10px;

            background: #6366f1;

            transition: .3s;
        }


        .password-strength small {

            display: block;

            margin-top: 5px;

            color: #9ca3af;

            font-size: 10px;
        }


        .field-error {

            display: block;

            margin-top: 5px;

            color: #ef4444;

            font-size: 11px;
        }


        /* =========================
            BUTTON
        ========================== */

        .register-button {

            width: 100%;

            height: 51px;

            border: 0;

            border-radius: 14px;

            cursor: pointer;

            color: white;

            font-family:
                'Plus Jakarta Sans',
                Arial,
                sans-serif;

            font-size: 13px;

            font-weight: 700;

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #7c3aed
                );

            box-shadow:
                0 10px 25px
                rgba(79,70,229,.2);

            transition: .3s;

            position: relative;

            overflow: hidden;
        }


        .register-button:hover {

            transform: translateY(-2px);

            box-shadow:
                0 15px 30px
                rgba(79,70,229,.28);
        }


        .register-button:active {

            transform: translateY(0);
        }


        .button-text,
        .button-loading {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;
        }


        .button-text svg {

            width: 17px;

            height: 17px;
        }


        .button-loading {

            display: none;
        }


        .register-button.loading .button-text {

            display: none;
        }


        .register-button.loading .button-loading {

            display: flex;
        }


        .spinner {

            width: 16px;

            height: 16px;

            border: 2px solid
                rgba(255,255,255,.35);

            border-top-color: white;

            border-radius: 50%;

            animation:
                spin .7s linear infinite;
        }


        @keyframes spin {

            to {
                transform: rotate(360deg);
            }

        }


        /* =========================
            LOGIN
        ========================== */

        .login-link {

            text-align: center;

            margin-top: 20px;

            color: #9ca3af;

            font-size: 12px;
        }


        .login-link a {

            color: #4f46e5;

            font-weight: 700;

            text-decoration: none;

            margin-left: 4px;
        }


        .login-link a:hover {

            text-decoration: underline;
        }


        /* =========================
            ALERT
        ========================== */

        .alert-box {

            display: flex;

            gap: 10px;

            padding: 12px;

            margin-bottom: 20px;

            border-radius: 12px;

            font-size: 11px;
        }


        .error-alert {

            background: #fef2f2;

            border: 1px solid #fecaca;

            color: #991b1b;
        }


        .alert-icon {

            display: flex;

            flex-shrink: 0;
        }


        .alert-icon svg {

            width: 18px;

            height: 18px;
        }


        .alert-box strong {

            font-size: 12px;
        }


        .alert-box ul {

            margin: 5px 0 0;

            padding-left: 15px;
        }


        /* =========================
            POPUP
        ========================== */

        .popup {

            position: fixed;

            inset: 0;

            z-index: 100;

            display: none;

            align-items: center;

            justify-content: center;

            padding: 20px;

            background:
                rgba(15,23,42,.35);

            backdrop-filter: blur(7px);
        }


        .popup.show {

            display: flex;

            animation:
                popupBackground .25s ease;
        }


        .popup-box {

            width: min(390px, 100%);

            padding: 30px;

            text-align: center;

            background: white;

            border-radius: 24px;

            box-shadow:
                0 30px 80px
                rgba(0,0,0,.18);

            animation:
                popupAppear .35s ease;
        }


        @keyframes popupBackground {

            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }

        }


        @keyframes popupAppear {

            from {

                opacity: 0;

                transform:
                    translateY(20px)
                    scale(.94);

            }

            to {

                opacity: 1;

                transform:
                    translateY(0)
                    scale(1);

            }

        }


        .popup-icon {

            width: 55px;

            height: 55px;

            margin: 0 auto 15px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 50%;

            background: #dcfce7;

            color: #16a34a;
        }


        .popup-icon svg {

            width: 25px;

            height: 25px;

            stroke-width: 2.5;
        }


        .popup-box h3 {

            margin: 0 0 8px;

            font-size: 20px;

            color: #111827;
        }


        .popup-box p {

            margin: 0 0 20px;

            color: #6b7280;

            font-size: 13px;

            line-height: 1.6;
        }


        .popup-box button {

            border: 0;

            padding: 10px 24px;

            border-radius: 10px;

            color: white;

            background: #4f46e5;

            font-family:
                'Plus Jakarta Sans',
                Arial,
                sans-serif;

            font-weight: 700;

            cursor: pointer;
        }


        /* =========================
            RESPONSIVE
        ========================== */


        /* Laptop besar */

        @media (min-width: 1200px) {

            .register-card {
                width: 1050px;
            }

            .register-info {
                padding: 60px 50px;
            }

            .register-form {
                padding: 55px 65px;
            }

        }


        /* Laptop kecil */

        @media (max-width: 1100px) {

            .register-card {

                width: 94%;

                grid-template-columns:
                    42% 58%;
            }

            .register-info {

                padding:
                    45px 35px;
            }

            .register-form {

                padding:
                    40px 45px;
            }

            .register-info h1 {

                font-size: 34px;
            }

        }


        /* Tablet */

        @media (max-width: 850px) {

            .register-page {

                padding: 25px 15px;

                align-items: center;
            }


            .register-card {

                width: 100%;

                max-width: 620px;

                grid-template-columns: 1fr;
            }


            .register-info {

                display: block;

                padding:
                    30px
                    30px
                    25px;
            }


            .register-info::after {

                display: none;
            }


            .floating-icon {

                width: 52px;

                height: 52px;

                margin-bottom: 15px;
            }


            .floating-icon svg {

                width: 25px;

                height: 25px;
            }


            .register-info h1 {

                font-size: 30px;

                margin-bottom: 10px;
            }


            .register-info > p {

                margin-bottom: 20px;
            }


            .info-list {

                display: none;
            }


            .school-footer {

                position: static;

                margin-top: 18px;
            }


            .register-form {

                padding:
                    35px
                    35px
                    40px;
            }

        }


        /* HP */

        @media (max-width: 600px) {

            .register-page {

                min-height: 100vh;

                padding: 12px;

                align-items: flex-start;
            }


            .register-card {

                width: 100%;

                max-width: 100%;

                border-radius: 22px;

                margin: 10px 0;
            }


            .register-info {

                padding:
                    25px
                    22px;
            }


            .register-info h1 {

                font-size: 27px;

                line-height: 1.15;
            }


            .register-info > p {

                font-size: 12px;

                line-height: 1.6;
            }


            .badge-school {

                font-size: 9px;

                padding: 6px 10px;
            }


            .school-footer {

                font-size: 10px;
            }


            .register-form {

                padding:
                    28px
                    20px
                    30px;
            }


            .form-header {

                margin-bottom: 22px;
            }


            .mobile-logo {

                width: 50px;

                height: 50px;

                display: flex;

                align-items: center;

                justify-content: center;

                border-radius: 15px;

                background: #eef2ff;

                color: #4f46e5;

                margin-bottom: 15px;
            }


            .form-header h2 {

                font-size: 25px;
            }


            .form-header p {

                font-size: 12px;

                line-height: 1.5;
            }


            .input-group {

                margin-bottom: 16px;
            }


            .input-group label {

                font-size: 11px;
            }


            .input-wrapper input {

                height: 48px;

                font-size: 13px;

                border-radius: 12px;
            }


            .register-button {

                height: 49px;

                border-radius: 12px;
            }


            .login-link {

                font-size: 11px;
            }

        }


        /* HP kecil */

        @media (max-width: 380px) {

            .register-page {

                padding: 8px;
            }


            .register-card {

                border-radius: 18px;
            }


            .register-info {

                padding:
                    22px
                    18px;
            }


            .register-info h1 {

                font-size: 24px;
            }


            .register-form {

                padding:
                    24px
                    17px
                    27px;
            }


            .form-header h2 {

                font-size: 23px;
            }


            .input-wrapper input {

                height: 46px;

                padding-left: 42px;
            }


            .register-button {

                height: 47px;
            }

        }


        /* HP landscape / pendek */

        @media (max-height: 650px) and (max-width: 850px) {

            .register-page {

                align-items: flex-start;

                padding-top: 10px;

                padding-bottom: 10px;
            }


            .register-info {

                padding-top: 20px;

                padding-bottom: 18px;
            }


            .register-form {

                padding-top: 25px;

                padding-bottom: 25px;
            }

        }

    </style>


    {{-- =========================
        JAVASCRIPT
    ========================== --}}
    <script>

        /* =========================
            LUCIDE
        ========================== */

        document.addEventListener('DOMContentLoaded', function () {

            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

        });


        /* =========================
            TOGGLE PASSWORD
        ========================== */

        function togglePassword(id, button) {

            const input =
                document.getElementById(id);

            if (input.type === 'password') {

                input.type = 'text';

                button.innerHTML =
                    '<i data-lucide="eye-off"></i>';

                button.setAttribute(
                    'aria-label',
                    'Sembunyikan password'
                );

            } else {

                input.type = 'password';

                button.innerHTML =
                    '<i data-lucide="eye"></i>';

                button.setAttribute(
                    'aria-label',
                    'Tampilkan password'
                );

            }


            if (typeof lucide !== 'undefined') {

                lucide.createIcons();

            }

        }


        /* =========================
            PASSWORD STRENGTH
        ========================== */

        const passwordInput =
            document.getElementById('password');

        const strengthProgress =
            document.getElementById('strengthProgress');

        const strengthText =
            document.getElementById('strengthText');


        if (passwordInput) {

            passwordInput.addEventListener(
                'input',
                function () {

                    const password =
                        this.value;

                    let strength = 0;


                    if (password.length >= 8) {
                        strength++;
                    }


                    if (/[A-Z]/.test(password)) {
                        strength++;
                    }


                    if (/[0-9]/.test(password)) {
                        strength++;
                    }


                    if (/[^A-Za-z0-9]/.test(password)) {
                        strength++;
                    }


                    const widths = [
                        '0%',
                        '25%',
                        '50%',
                        '75%',
                        '100%'
                    ];


                    strengthProgress.style.width =
                        widths[strength];


                    if (password.length === 0) {

                        strengthText.textContent =
                            'Gunakan minimal 8 karakter';

                    } else if (strength <= 1) {

                        strengthText.textContent =
                            'Password lemah';

                    } else if (strength === 2) {

                        strengthText.textContent =
                            'Password cukup';

                    } else if (strength === 3) {

                        strengthText.textContent =
                            'Password kuat';

                    } else {

                        strengthText.textContent =
                            'Password sangat kuat';

                    }

                }
            );

        }


        /* =========================
            LOADING SUBMIT
        ========================== */

        const registerForm =
            document.getElementById('registerForm');

        const registerButton =
            document.getElementById('registerButton');


        if (registerForm) {

            registerForm.addEventListener(
                'submit',
                function () {

                    registerButton.classList.add(
                        'loading'
                    );

                }
            );

        }


        /* =========================
            POPUP
        ========================== */

        function showPopup(title, message) {

            document.getElementById(
                'popupTitle'
            ).textContent = title;


            document.getElementById(
                'popupMessage'
            ).textContent = message;


            document.getElementById(
                'popup'
            ).classList.add('show');

        }


        function closePopup() {

            document.getElementById(
                'popup'
            ).classList.remove('show');

        }


        /* =========================
            CLOSE POPUP OUTSIDE
        ========================== */

        const popup =
            document.getElementById('popup');


        if (popup) {

            popup.addEventListener(
                'click',
                function (event) {

                    if (event.target === this) {

                        closePopup();

                    }

                }
            );

        }

    </script>

</x-guest-layout>