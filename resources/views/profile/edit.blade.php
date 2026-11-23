<x-app-layout>
    <div class="profile-page">

        <div class="profile-container">

            {{-- HEADER --}}
            <div class="profile-header">
                <div>
                    <span class="profile-eyebrow">
                        AKUN SAYA
                    </span>

                    <h1>Profil Saya</h1>

                    <p>
                        Kelola informasi akun dan keamanan akunmu.
                    </p>
                </div>

                <a href="{{ route('dashboard') }}" class="back-button">
                    <i data-lucide="arrow-left" width="17"></i>
                    Dashboard
                </a>
            </div>


            {{-- ALERT --}}
            @if (session('status') === 'profile-updated')
                <div class="alert success">
                    <i data-lucide="circle-check"></i>
                    <div>
                        <strong>Profil berhasil diperbarui.</strong>
                        <span>Perubahan akunmu sudah disimpan.</span>
                    </div>
                </div>
            @endif

            @if (session('status') === 'photo-removed')
                <div class="alert success">
                    <i data-lucide="circle-check"></i>
                    <div>
                        <strong>Foto profil dihapus.</strong>
                        <span>Avatar default digunakan kembali.</span>
                    </div>
                </div>
            @endif

            @if (session('status') === 'password-updated')
                <div class="alert success">
                    <i data-lucide="shield-check"></i>
                    <div>
                        <strong>Password berhasil diubah.</strong>
                        <span>Gunakan password baru saat login berikutnya.</span>
                    </div>
                </div>
            @endif


            <div class="profile-grid">

                {{-- LEFT --}}
                <div class="profile-main">

                    {{-- PROFILE CARD --}}
                    <div class="profile-card profile-hero">

                        <div class="avatar-wrapper">

                            @if ($user->profile_photo)

                                <img
                                    id="avatarPreview"
                                    src="{{ asset('storage/' . $user->profile_photo) }}"
                                    alt="Foto Profil"
                                    class="profile-avatar"
                                >

                            @else

                                <div
                                    id="avatarInitial"
                                    class="profile-avatar avatar-initial"
                                >
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>

                                <img
                                    id="avatarPreview"
                                    src=""
                                    alt="Preview Foto"
                                    class="profile-avatar hidden"
                                >

                            @endif

                            <label
                                for="profile_photo"
                                class="avatar-edit"
                                title="Ganti foto"
                            >
                                <i data-lucide="camera" width="17"></i>
                            </label>

                        </div>

                        <div class="profile-identity">
                            <h2>{{ $user->name }}</h2>

                            <p>
                                {{ '@' . ($user->username ?? 'username') }}
                            </p>

                            <span class="account-badge">
                                <i data-lucide="circle-check" width="14"></i>
                                Akun Pendaftar
                            </span>
                        </div>

                    </div>


                    {{-- ACCOUNT INFORMATION --}}
                    <div class="profile-card">

                        <div class="card-heading">
                            <div class="heading-icon">
                                <i data-lucide="user-round"></i>
                            </div>

                            <div>
                                <h2>Informasi Akun</h2>
                                <p>Perbarui informasi dasar akunmu.</p>
                            </div>
                        </div>


                        <form
                            method="POST"
                            action="{{ route('profile.update') }}"
                            enctype="multipart/form-data"
                            class="profile-form"
                        >

                            @csrf
                            @method('PATCH')


                            {{-- FOTO --}}
                            <input
                                id="profile_photo"
                                name="profile_photo"
                                type="file"
                                accept="image/jpeg,image/png,image/webp"
                                class="file-hidden"
                            >

                            @error('profile_photo')
                                <p class="field-error">{{ $message }}</p>
                            @enderror


                            {{-- NAMA --}}
                            <div class="field">

                                <label for="name">
                                    Nama Lengkap
                                </label>

                                <div class="input-wrapper">
                                    <i data-lucide="user"></i>

                                    <input
                                        id="name"
                                        name="name"
                                        type="text"
                                        value="{{ old('name', $user->name) }}"
                                        required
                                        autocomplete="name"
                                    >
                                </div>

                                @error('name')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- USERNAME --}}
                            <div class="field">

                                <label for="username">
                                    Username
                                </label>

                                <div class="input-wrapper">
                                    <span class="input-prefix">@</span>

                                    <input
                                        id="username"
                                        name="username"
                                        type="text"
                                        value="{{ old('username', $user->username) }}"
                                        required
                                        autocomplete="username"
                                        placeholder="contoh: donie123"
                                    >
                                </div>

                                <small>
                                    Username digunakan sebagai identitas akunmu.
                                </small>

                                @error('username')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- EMAIL --}}
                            <div class="field">

                                <label for="email">
                                    Email
                                </label>

                                <div class="input-wrapper">
                                    <i data-lucide="mail"></i>

                                    <input
                                        id="email"
                                        name="email"
                                        type="email"
                                        value="{{ old('email', $user->email) }}"
                                        required
                                        autocomplete="email"
                                    >
                                </div>

                                @error('email')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- ACTION --}}
                            <div class="form-actions">

                                <button
                                    type="submit"
                                    class="primary-button"
                                >
                                    <i data-lucide="save" width="17"></i>
                                    Simpan Perubahan
                                </button>

                            </div>

                        </form>


                        {{-- REMOVE PHOTO --}}
                        @if ($user->profile_photo)

                            <form
                                method="POST"
                                action="{{ route('profile.photo.remove') }}"
                                class="remove-photo-form"
                                onsubmit="return confirm('Hapus foto profil?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="remove-photo-button">
                                    <i data-lucide="trash-2" width="16"></i>
                                    Hapus Foto Profil
                                </button>

                            </form>

                        @endif

                    </div>


                    {{-- PASSWORD --}}
                    <div class="profile-card">

                        <div class="card-heading">

                            <div class="heading-icon security">
                                <i data-lucide="shield"></i>
                            </div>

                            <div>
                                <h2>Keamanan Akun</h2>
                                <p>Pastikan akunmu tetap aman.</p>
                            </div>

                        </div>


                        <form
                            method="POST"
                            action="{{ route('password.update') }}"
                            class="profile-form"
                        >

                            @csrf
                            @method('PUT')


                            {{-- CURRENT PASSWORD --}}
                            <div class="field">

                                <label for="current_password">
                                    Password Saat Ini
                                </label>

                                <div class="input-wrapper password-wrapper">

                                    <i data-lucide="lock"></i>

                                    <input
                                        id="current_password"
                                        name="current_password"
                                        type="password"
                                        autocomplete="current-password"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="current_password"
                                    >
                                        <i data-lucide="eye"></i>
                                    </button>

                                </div>

                                @error('current_password', 'updatePassword')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- NEW PASSWORD --}}
                            <div class="field">

                                <label for="password">
                                    Password Baru
                                </label>

                                <div class="input-wrapper password-wrapper">

                                    <i data-lucide="key-round"></i>

                                    <input
                                        id="password"
                                        name="password"
                                        type="password"
                                        autocomplete="new-password"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="password"
                                    >
                                        <i data-lucide="eye"></i>
                                    </button>

                                </div>

                                @error('password', 'updatePassword')
                                    <p class="field-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- CONFIRM --}}
                            <div class="field">

                                <label for="password_confirmation">
                                    Konfirmasi Password Baru
                                </label>

                                <div class="input-wrapper password-wrapper">

                                    <i data-lucide="shield-check"></i>

                                    <input
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        type="password"
                                        autocomplete="new-password"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="password_confirmation"
                                    >
                                        <i data-lucide="eye"></i>
                                    </button>

                                </div>

                            </div>


                            <div class="password-info">
                                <i data-lucide="info" width="16"></i>
                                <span>
                                    Gunakan minimal 8 karakter agar password lebih aman.
                                </span>
                            </div>


                            <div class="form-actions">

                                <button
                                    type="submit"
                                    class="primary-button"
                                >
                                    <i data-lucide="key-round" width="17"></i>
                                    Ubah Password
                                </button>

                            </div>

                        </form>

                    </div>

                </div>


                {{-- RIGHT --}}
                <aside class="profile-side">

                    <div class="profile-card tips-card">

                        <div class="tips-icon">
                            <i data-lucide="sparkles"></i>
                        </div>

                        <h3>Tips Akun</h3>

                        <p>
                            Lengkapi informasi akunmu agar proses pendaftaran
                            siswa berjalan lebih mudah.
                        </p>

                        <div class="tip-list">

                            <div>
                                <i data-lucide="check"></i>
                                <span>Gunakan email aktif.</span>
                            </div>

                            <div>
                                <i data-lucide="check"></i>
                                <span>Gunakan password yang kuat.</span>
                            </div>

                            <div>
                                <i data-lucide="check"></i>
                                <span>Gunakan foto yang jelas.</span>
                            </div>

                        </div>

                    </div>


                    <div class="profile-card account-status">

                        <div class="status-top">
                            <span>Status Akun</span>

                            <i data-lucide="shield-check"></i>
                        </div>

                        <strong>Aktif</strong>

                        <p>
                            Akunmu dapat digunakan untuk mengakses
                            sistem pendaftaran.
                        </p>

                    </div>

                </aside>

            </div>

        </div>

    </div>


    <style>

        * {
            box-sizing: border-box;
        }

        .profile-page {
            min-height: 100vh;
            background:
                radial-gradient(
                    circle at top right,
                    rgba(124, 58, 237, .08),
                    transparent 35%
                ),
                #f8fafc;
            padding: 42px 24px 70px;
            color: #172033;
        }

        .profile-container {
            max-width: 1180px;
            margin: auto;
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 28px;
        }

        .profile-eyebrow {
            display: inline-block;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .16em;
            color: #7c3aed;
            margin-bottom: 8px;
        }

        .profile-header h1 {
            margin: 0;
            font-size: clamp(30px, 4vw, 42px);
            font-weight: 800;
            letter-spacing: -.04em;
        }

        .profile-header p {
            margin: 8px 0 0;
            color: #64748b;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 16px;
            border-radius: 12px;
            background: white;
            border: 1px solid #e2e8f0;
            color: #334155;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: .2s;
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(15, 23, 42, .08);
        }

        .alert {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 15px 18px;
            margin-bottom: 22px;
            border-radius: 15px;
            border: 1px solid #bbf7d0;
            background: #f0fdf4;
            color: #166534;
        }

        .alert div {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .alert span {
            font-size: 13px;
            color: #4d7c5a;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 310px;
            gap: 22px;
            align-items: start;
        }

        .profile-main {
            display: flex;
            flex-direction: column;
            gap: 22px;
        }

        .profile-card {
            background: rgba(255, 255, 255, .92);
            border: 1px solid #e8edf4;
            border-radius: 22px;
            padding: 26px;
            box-shadow: 0 12px 35px rgba(15, 23, 42, .05);
        }

        .profile-hero {
            display: flex;
            align-items: center;
            gap: 22px;
            padding: 24px;
        }

        .avatar-wrapper {
            position: relative;
            width: 104px;
            height: 104px;
            flex-shrink: 0;
        }

        .profile-avatar {
            width: 104px;
            height: 104px;
            border-radius: 30px;
            object-fit: cover;
            display: block;
        }

        .avatar-initial {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: white;
            font-size: 38px;
            font-weight: 800;
            box-shadow: 0 12px 28px rgba(124, 58, 237, .25);
        }

        .avatar-edit {
            position: absolute;
            right: -7px;
            bottom: -7px;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #172033;
            color: white;
            border: 3px solid white;
            cursor: pointer;
            transition: .2s;
        }

        .avatar-edit:hover {
            transform: scale(1.08);
        }

        .profile-identity h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 800;
        }

        .profile-identity p {
            margin: 5px 0 12px;
            color: #64748b;
        }

        .account-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 10px;
            border-radius: 999px;
            background: #f3e8ff;
            color: #7c3aed;
            font-size: 12px;
            font-weight: 800;
        }

        .card-heading {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 24px;
        }

        .heading-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #f3e8ff;
            color: #7c3aed;
        }

        .heading-icon.security {
            background: #ecfdf5;
            color: #059669;
        }

        .card-heading h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 800;
        }

        .card-heading p {
            margin: 3px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .profile-form {
            display: flex;
            flex-direction: column;
            gap: 19px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .field label {
            font-size: 13px;
            font-weight: 750;
            color: #334155;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper > svg {
            position: absolute;
            left: 15px;
            color: #94a3b8;
            pointer-events: none;
        }

        .input-wrapper input {
            width: 100%;
            height: 48px;
            border: 1px solid #dce3ec;
            border-radius: 13px;
            background: #fff;
            padding: 0 15px 0 44px;
            outline: none;
            color: #172033;
            font-size: 14px;
            transition: .2s;
        }

        .input-wrapper input:focus {
            border-color: #a78bfa;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, .08);
        }

        .input-prefix {
            position: absolute;
            left: 15px;
            font-weight: 800;
            color: #7c3aed;
            z-index: 1;
        }

        .input-prefix + input {
            padding-left: 35px;
        }

        .field small {
            color: #94a3b8;
            font-size: 12px;
        }

        .field-error {
            margin: 0;
            color: #e11d48;
            font-size: 12px;
        }

        .password-wrapper input {
            padding-right: 48px;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            width: 35px;
            height: 35px;
            border: 0;
            background: transparent;
            color: #94a3b8;
            cursor: pointer;
            border-radius: 9px;
        }

        .password-toggle:hover {
            background: #f1f5f9;
            color: #475569;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 4px;
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 45px;
            padding: 0 18px;
            border: 0;
            border-radius: 12px;
            background: #7c3aed;
            color: white;
            font-weight: 750;
            cursor: pointer;
            transition: .2s;
        }

        .primary-button:hover {
            background: #6d28d9;
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(124, 58, 237, .2);
        }

        .remove-photo-form {
            margin-top: 15px;
        }

        .remove-photo-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            border: 0;
            background: transparent;
            color: #e11d48;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            padding: 5px 0;
        }

        .password-info {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 11px 13px;
            border-radius: 11px;
            background: #f8fafc;
            color: #64748b;
            font-size: 12px;
        }

        .profile-side {
            display: flex;
            flex-direction: column;
            gap: 22px;
            position: sticky;
            top: 25px;
        }

        .tips-icon {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background: #f3e8ff;
            color: #7c3aed;
            margin-bottom: 16px;
        }

        .tips-card h3 {
            margin: 0;
            font-size: 18px;
        }

        .tips-card > p {
            margin: 8px 0 20px;
            color: #64748b;
            line-height: 1.6;
            font-size: 13px;
        }

        .tip-list {
            display: flex;
            flex-direction: column;
            gap: 13px;
        }

        .tip-list div {
            display: flex;
            gap: 9px;
            align-items: flex-start;
            color: #475569;
            font-size: 13px;
        }

        .tip-list svg {
            flex-shrink: 0;
            color: #10b981;
            margin-top: 1px;
        }

        .account-status {
            background: linear-gradient(135deg, #172033, #263247);
            color: white;
        }

        .status-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #cbd5e1;
            font-size: 13px;
        }

        .status-top svg {
            color: #a78bfa;
        }

        .account-status strong {
            display: block;
            margin-top: 12px;
            font-size: 24px;
        }

        .account-status p {
            margin: 6px 0 0;
            color: #cbd5e1;
            font-size: 12px;
            line-height: 1.6;
        }

        .file-hidden {
            display: none;
        }

        .hidden {
            display: none !important;
        }

        @media (max-width: 900px) {

            .profile-grid {
                grid-template-columns: 1fr;
            }

            .profile-side {
                position: static;
            }

        }

        @media (max-width: 600px) {

            .profile-page {
                padding: 25px 14px 50px;
            }

            .profile-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .profile-header h1 {
                font-size: 31px;
            }

            .profile-card {
                padding: 20px;
                border-radius: 18px;
            }

            .profile-hero {
                align-items: flex-start;
            }

            .avatar-wrapper,
            .profile-avatar {
                width: 82px;
                height: 82px;
            }

            .avatar-initial {
                font-size: 30px;
            }

            .profile-identity h2 {
                font-size: 20px;
            }

            .form-actions {
                justify-content: stretch;
            }

            .primary-button {
                width: 100%;
            }

        }

    </style>


    <script>

        document.addEventListener('DOMContentLoaded', () => {

            /*
            |--------------------------------------------------------------------------
            | Lucide
            |--------------------------------------------------------------------------
            */

            if (window.lucide) {
                lucide.createIcons();
            }


            /*
            |--------------------------------------------------------------------------
            | Preview Foto
            |--------------------------------------------------------------------------
            */

            const photoInput =
                document.getElementById('profile_photo');

            const preview =
                document.getElementById('avatarPreview');

            const initial =
                document.getElementById('avatarInitial');


            if (photoInput) {

                photoInput.addEventListener('change', function () {

                    const file = this.files[0];

                    if (!file) {
                        return;
                    }

                    if (file.size > 2 * 1024 * 1024) {

                        alert('Ukuran foto maksimal 2 MB.');

                        this.value = '';

                        return;
                    }


                    const reader = new FileReader();

                    reader.onload = function (event) {

                        preview.src = event.target.result;

                        preview.classList.remove('hidden');

                        if (initial) {
                            initial.classList.add('hidden');
                        }

                    };

                    reader.readAsDataURL(file);

                });

            }


            /*
            |--------------------------------------------------------------------------
            | Toggle Password
            |--------------------------------------------------------------------------
            */

            document
                .querySelectorAll('.password-toggle')
                .forEach(button => {

                    button.addEventListener('click', () => {

                        const target =
                            document.getElementById(
                                button.dataset.target
                            );

                        const icon =
                            button.querySelector('svg');

                        if (target.type === 'password') {

                            target.type = 'text';

                            icon.setAttribute(
                                'data-lucide',
                                'eye-off'
                            );

                        } else {

                            target.type = 'password';

                            icon.setAttribute(
                                'data-lucide',
                                'eye'
                            );

                        }

                        lucide.createIcons();

                    });

                });

        });

    </script>

</x-app-layout>