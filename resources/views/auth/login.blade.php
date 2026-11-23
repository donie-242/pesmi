<x-guest-layout>

    <div class="login-page">

        {{-- Background Decoration --}}
        <div class="bg-decoration bg-decoration-1"></div>
        <div class="bg-decoration bg-decoration-2"></div>
        <div class="bg-decoration bg-decoration-3"></div>

        <div class="login-container">

            {{-- LEFT SIDE --}}
            <div class="login-info">

                <div class="floating-icon">
                    <i data-lucide="graduation-cap"></i>
                </div>

                <span class="badge-school">
                    <i data-lucide="sparkles"></i>
                    PPDB ONLINE
                </span>

                <h1>
                    Selamat Datang<br>
                    di <span>MI Ar-Rawiyah</span>
                </h1>

                <p class="login-description">
                    Silakan masuk ke akun kamu untuk melanjutkan
                    proses pendaftaran siswa baru.
                </p>

                <div class="info-list">

                    <div class="info-item">
                        <div class="info-icon">
                            <i data-lucide="clipboard-list"></i>
                        </div>

                        <div>
                            <strong>Data Pendaftaran</strong>
                            <p>Kelola data pendaftaran dengan mudah.</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i data-lucide="file-text"></i>
                        </div>

                        <div>
                            <strong>Dokumen</strong>
                            <p>Upload dokumen persyaratan secara online.</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i data-lucide="badge-check"></i>
                        </div>

                        <div>
                            <strong>Pantau Pendaftaran</strong>
                            <p>Lihat status pendaftaran kapan saja.</p>
                        </div>
                    </div>

                </div>

            </div>


            {{-- RIGHT SIDE --}}
            <div class="login-card">

                <div class="mobile-logo">
                    <div class="mobile-logo-icon">
                        <i data-lucide="graduation-cap"></i>
                    </div>

                    <div>
                        <strong>MI Ar-Rawiyah</strong>
                        <span>PPDB Online</span>
                    </div>
                </div>


                <div class="login-header">

                    <h2>Masuk ke Akun</h2>

                    <p>
                        Silakan masukkan akun yang sudah terdaftar.
                    </p>

                </div>


                {{-- Session Status --}}
                <x-auth-session-status
                    class="login-alert success"
                    :status="session('status')"
                />


                {{-- General Error --}}
                @if ($errors->any())

                    <div class="login-alert error">

                        <i data-lucide="triangle-alert"></i>

                        <div>
                            <strong>Login gagal</strong>

                            <p>
                                Email atau password yang kamu masukkan
                                tidak sesuai.
                            </p>
                        </div>

                    </div>

                @endif


                <form method="POST" action="{{ route('login') }}" id="loginForm">

                    @csrf


                    {{-- Email --}}
                    <div class="form-group">

                        <label for="email">
                            <i data-lucide="mail"></i>
                            Email
                        </label>

                        <div class="input-wrapper">

                            <i data-lucide="mail" class="input-icon"></i>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Masukkan email kamu"
                            >

                        </div>

                        @error('email')
                            <span class="field-error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Password --}}
                    <div class="form-group">

                        <label for="password">
                            <i data-lucide="lock-keyhole"></i>
                            Password
                        </label>

                        <div class="input-wrapper">

                            <i data-lucide="lock-keyhole" class="input-icon"></i>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan password kamu"
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword()"
                                aria-label="Tampilkan password"
                            >
                                <i data-lucide="eye" id="eyeIcon"></i>
                            </button>

                        </div>

                        @error('password')
                            <span class="field-error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Remember + Forgot --}}
                    <div class="form-options">

                        <label class="remember">

                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                            >

                            <span>Ingat saya</span>

                        </label>


                        @if (Route::has('password.request'))

                            <a href="{{ route('password.request') }}">
                                Lupa password?
                            </a>

                        @endif

                    </div>


                    {{-- Button --}}
                    <button
                        type="submit"
                        class="login-button"
                        id="loginButton"
                    >

                        <span id="buttonText">
                            Masuk ke Akun
                        </span>

                        <i data-lucide="arrow-right" id="buttonIcon"></i>

                        <span
                            class="button-loader"
                            id="buttonLoader"
                        ></span>

                    </button>

                </form>


                {{-- Register --}}
                <div class="register-link">

                    <span>Belum punya akun?</span>

                    <a href="{{ route('register') }}">
                        Daftar sekarang
                        <i data-lucide="arrow-right"></i>
                    </a>

                </div>


                <div class="login-footer">
                    © {{ date('Y') }} MI Ar-Rawiyah
                </div>

            </div>

        </div>

    </div>


    <style>

        * {
            box-sizing: border-box;
        }


        .login-page {
            min-height: 100vh;
            position: relative;
            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 40px 20px;

            font-family: 'Plus Jakarta Sans', sans-serif;

            background:
                linear-gradient(
                    135deg,
                    #f8fbff 0%,
                    #eef7ff 50%,
                    #f8fbff 100%
                );
        }


        /* =========================
           BACKGROUND
        ========================= */

        .bg-decoration {
            position: absolute;
            border-radius: 50%;
            filter: blur(2px);
            opacity: .45;
            pointer-events: none;

            animation: float 8s ease-in-out infinite;
        }

        .bg-decoration-1 {
            width: 300px;
            height: 300px;

            background: #dbeafe;

            top: -100px;
            left: -100px;
        }

        .bg-decoration-2 {
            width: 250px;
            height: 250px;

            background: #e0e7ff;

            right: -80px;
            bottom: -80px;

            animation-delay: 2s;
        }

        .bg-decoration-3 {
            width: 120px;
            height: 120px;

            background: #cffafe;

            right: 15%;
            top: 10%;

            animation-delay: 4s;
        }


        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-18px);
            }
        }


        /* =========================
           CONTAINER
        ========================= */

        .login-container {
            width: 100%;
            max-width: 1100px;

            display: grid;
            grid-template-columns: 1fr 460px;

            background: rgba(255, 255, 255, .88);

            backdrop-filter: blur(20px);

            border-radius: 30px;

            overflow: hidden;

            box-shadow:
                0 25px 70px rgba(15, 23, 42, .10);

            border: 1px solid rgba(255, 255, 255, .8);

            position: relative;
            z-index: 2;

            animation: containerIn .7s ease;
        }


        @keyframes containerIn {

            from {
                opacity: 0;
                transform: translateY(25px) scale(.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }


        /* =========================
           LEFT
        ========================= */

        .login-info {
            padding: 65px 60px;

            display: flex;
            flex-direction: column;
            justify-content: center;

            background:
                linear-gradient(
                    145deg,
                    #f0f9ff,
                    #eff6ff
                );
        }


        .floating-icon {
            width: 68px;
            height: 68px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 20px;

            background: white;

            color: #2563eb;

            box-shadow:
                0 12px 30px rgba(37, 99, 235, .12);

            margin-bottom: 24px;

            animation: iconFloat 3s ease-in-out infinite;
        }


        .floating-icon svg {
            width: 34px;
            height: 34px;
        }


        @keyframes iconFloat {

            0%,
            100% {
                transform: translateY(0) rotate(0);
            }

            50% {
                transform: translateY(-7px) rotate(2deg);
            }
        }


        .badge-school {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            width: fit-content;

            padding: 8px 13px;

            border-radius: 50px;

            background: #dbeafe;
            color: #2563eb;

            font-size: 12px;
            font-weight: 800;

            letter-spacing: .5px;

            margin-bottom: 18px;
        }


        .badge-school svg {
            width: 15px;
            height: 15px;
        }


        .login-info h1 {
            margin: 0;

            color: #0f172a;

            font-size: 40px;
            line-height: 1.15;

            font-weight: 800;

            letter-spacing: -1.5px;
        }


        .login-info h1 span {
            color: #2563eb;
        }


        .login-description {
            max-width: 480px;

            margin: 20px 0 35px;

            color: #64748b;

            font-size: 15px;
            line-height: 1.8;
        }


        /* =========================
           INFO LIST
        ========================= */

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }


        .info-item {
            display: flex;
            align-items: center;
            gap: 14px;
        }


        .info-icon {
            width: 44px;
            height: 44px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 13px;

            background: white;
            color: #2563eb;

            box-shadow: 0 5px 15px rgba(15, 23, 42, .06);
        }


        .info-icon svg {
            width: 21px;
            height: 21px;
        }


        .info-item strong {
            display: block;

            color: #1e293b;

            font-size: 14px;
            font-weight: 700;
        }


        .info-item p {
            margin: 3px 0 0;

            color: #94a3b8;

            font-size: 12px;
        }


        /* =========================
           CARD
        ========================= */

        .login-card {
            padding: 50px 45px;

            background: white;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }


        .login-header {
            margin-bottom: 28px;
        }


        .login-header h2 {
            margin: 0 0 8px;

            color: #0f172a;

            font-size: 27px;
            font-weight: 800;

            letter-spacing: -.7px;
        }


        .login-header p {
            margin: 0;

            color: #94a3b8;

            font-size: 13px;
            line-height: 1.6;
        }


        .mobile-logo {
            display: none;
        }


        /* =========================
           FORM
        ========================= */

        .form-group {
            margin-bottom: 20px;
        }


        .form-group label {
            display: flex;
            align-items: center;
            gap: 7px;

            margin-bottom: 8px;

            color: #334155;

            font-size: 13px;
            font-weight: 700;
        }


        .form-group label svg {
            width: 16px;
            height: 16px;

            color: #64748b;
        }


        .input-wrapper {
            position: relative;
        }


        .input-wrapper .input-icon {
            position: absolute;

            left: 15px;
            top: 50%;

            width: 18px;
            height: 18px;

            transform: translateY(-50%);

            color: #94a3b8;

            pointer-events: none;
        }


        .input-wrapper input {
            width: 100%;

            height: 50px;

            padding: 0 45px;

            border: 1px solid #e2e8f0;

            border-radius: 13px;

            background: #f8fafc;

            color: #0f172a;

            font-family: inherit;

            font-size: 13px;

            outline: none;

            transition: .25s;
        }


        .input-wrapper input::placeholder {
            color: #b4becb;
        }


        .input-wrapper input:focus {
            border-color: #60a5fa;

            background: white;

            box-shadow:
                0 0 0 4px rgba(59, 130, 246, .08);
        }


        .password-toggle {
            position: absolute;

            right: 13px;
            top: 50%;

            transform: translateY(-50%);

            border: none;
            background: transparent;

            color: #94a3b8;

            cursor: pointer;

            padding: 5px;
        }


        .password-toggle:hover {
            color: #2563eb;
        }


        .password-toggle svg {
            width: 18px;
            height: 18px;
        }


        .field-error {
            display: block;

            margin-top: 7px;

            color: #ef4444;

            font-size: 11px;
        }


        /* =========================
           ALERT
        ========================= */

        .login-alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;

            padding: 12px 14px;

            border-radius: 12px;

            margin-bottom: 20px;

            font-size: 12px;
        }


        .login-alert svg {
            width: 18px;
            height: 18px;

            flex-shrink: 0;
        }


        .login-alert.error {
            background: #fef2f2;
            color: #dc2626;

            border: 1px solid #fecaca;
        }


        .login-alert.success {
            background: #f0fdf4;
            color: #16a34a;

            border: 1px solid #bbf7d0;
        }


        .login-alert strong {
            display: block;

            margin-bottom: 2px;

            font-weight: 800;
        }


        .login-alert p {
            margin: 0;

            line-height: 1.5;
        }


        /* =========================
           OPTIONS
        ========================= */

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin: 4px 0 22px;
        }


        .remember {
            display: flex;
            align-items: center;
            gap: 7px;

            color: #64748b;

            font-size: 12px;

            cursor: pointer;
        }


        .remember input {
            width: 15px;
            height: 15px;

            accent-color: #2563eb;

            cursor: pointer;
        }


        .form-options a {
            color: #2563eb;

            font-size: 12px;
            font-weight: 700;

            text-decoration: none;
        }


        .form-options a:hover {
            text-decoration: underline;
        }


        /* =========================
           BUTTON
        ========================= */

        .login-button {
            width: 100%;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            border: none;
            border-radius: 13px;

            background: linear-gradient(
                135deg,
                #2563eb,
                #3b82f6
            );

            color: white;

            font-family: inherit;

            font-size: 13px;
            font-weight: 800;

            cursor: pointer;

            box-shadow:
                0 10px 25px rgba(37, 99, 235, .22);

            transition: .25s;
        }


        .login-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 14px 30px rgba(37, 99, 235, .28);
        }


        .login-button:active {
            transform: translateY(0);
        }


        .login-button svg {
            width: 18px;
            height: 18px;
        }


        .button-loader {
            display: none;

            width: 17px;
            height: 17px;

            border: 2px solid rgba(255,255,255,.4);
            border-top-color: white;

            border-radius: 50%;

            animation: spin .7s linear infinite;
        }


        .login-button.loading .button-loader {
            display: block;
        }


        .login-button.loading #buttonIcon {
            display: none;
        }


        @keyframes spin {

            to {
                transform: rotate(360deg);
            }
        }


        /* =========================
           REGISTER
        ========================= */

        .register-link {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;

            margin-top: 25px;

            color: #94a3b8;

            font-size: 12px;
        }


        .register-link a {
            display: inline-flex;
            align-items: center;
            gap: 4px;

            color: #2563eb;

            font-weight: 800;

            text-decoration: none;
        }


        .register-link a:hover {
            text-decoration: underline;
        }


        .register-link svg {
            width: 14px;
            height: 14px;
        }


        .login-footer {
            margin-top: 25px;

            text-align: center;

            color: #cbd5e1;

            font-size: 10px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 850px) {

            .login-page {
                padding: 20px;
            }


            .login-container {
                max-width: 500px;

                grid-template-columns: 1fr;

                border-radius: 25px;
            }


            .login-info {
                display: none;
            }


            .login-card {
                padding: 40px 30px;
            }


            .mobile-logo {
                display: flex;
                align-items: center;
                gap: 12px;

                margin-bottom: 30px;
            }


            .mobile-logo-icon {
                width: 45px;
                height: 45px;

                display: flex;
                align-items: center;
                justify-content: center;

                border-radius: 13px;

                background: #dbeafe;
                color: #2563eb;
            }


            .mobile-logo-icon svg {
                width: 23px;
                height: 23px;
            }


            .mobile-logo strong {
                display: block;

                color: #0f172a;

                font-size: 14px;
                font-weight: 800;
            }


            .mobile-logo span {
                display: block;

                margin-top: 2px;

                color: #94a3b8;

                font-size: 10px;
            }

        }


        @media (max-width: 480px) {

            .login-page {
                padding: 12px;
            }


            .login-card {
                padding: 30px 22px;
            }


            .login-header h2 {
                font-size: 24px;
            }


            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

        }
        /* =========================
   LOGIN ENTRY ANIMATION
========================= */

.login-container {
    animation: loginContainerIn 0.8s cubic-bezier(.22, 1, .36, 1) both;
}

.login-info > *,
.login-card > * {
    opacity: 0;
    animation: loginElementIn 0.7s cubic-bezier(.22, 1, .36, 1) forwards;
}

/* LEFT */
.login-info > .floating-icon {
    animation-delay: .15s;
}

.login-info > .badge-school {
    animation-delay: .25s;
}

.login-info > h1 {
    animation-delay: .35s;
}

.login-info > .login-description {
    animation-delay: .45s;
}

.login-info > .info-list {
    animation-delay: .55s;
}

/* RIGHT */
.login-card > .mobile-logo {
    animation-delay: .15s;
}

.login-card > .login-header {
    animation-delay: .25s;
}

.login-card > .login-alert {
    animation-delay: .3s;
}

.login-card > #loginForm {
    animation-delay: .35s;
}

.login-card > .register-link {
    animation-delay: .55s;
}

.login-card > .login-footer {
    animation-delay: .65s;
}

@keyframes loginContainerIn {
    from {
        opacity: 0;
        transform: translateY(35px) scale(.97);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes loginElementIn {
    from {
        opacity: 0;
        transform: translateY(18px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* INPUT FOCUS EFFECT */
.input-wrapper input:focus {
    transform: translateY(-1px);
}

/* BUTTON CLICK */
.login-button:active {
    transform: scale(.98);
}

/* Reduce animation for users who disable motion */
@media (prefers-reduced-motion: reduce) {
    .login-container,
    .login-info > *,
    .login-card > * {
        animation: none;
        opacity: 1;
    }
}                                                                           

    </style>


    <script>

        // =========================
        // LUCIDE ICON
        // =========================

        document.addEventListener('DOMContentLoaded', function () {

            if (window.lucide) {
                lucide.createIcons();
            }

        });


        // =========================
        // SHOW / HIDE PASSWORD
        // =========================

        function togglePassword() {

            const password = document.getElementById('password');

            const icon = document.getElementById('eyeIcon');

            if (password.type === 'password') {

                password.type = 'text';

                icon.setAttribute('data-lucide', 'eye-off');

            } else {

                password.type = 'password';

                icon.setAttribute('data-lucide', 'eye');

            }

            lucide.createIcons();

        }


        // =========================
        // LOGIN LOADING
        // =========================

        document.getElementById('loginForm').addEventListener('submit', function () {

            const button = document.getElementById('loginButton');

            const text = document.getElementById('buttonText');

            button.classList.add('loading');

            text.textContent = 'Memproses...';

        });

    </script>

</x-guest-layout>