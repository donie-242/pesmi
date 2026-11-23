<x-app-layout>

    <style>
    /* =========================================================
       BASE
    ========================================================= */

    .registration-page {
        position: relative;
        min-height: 100vh;
        overflow: hidden;

        background:
            radial-gradient(
                circle at 0% 0%,
                rgba(16, 185, 129, 0.10),
                transparent 30%
            ),
            radial-gradient(
                circle at 100% 10%,
                rgba(14, 165, 233, 0.07),
                transparent 28%
            ),
            linear-gradient(
                180deg,
                #f8fafc 0%,
                #f1f5f9 100%
            );
    }


    /* Dekorasi background */

    .registration-page::before {
        content: "";
        position: absolute;

        width: 420px;
        height: 420px;

        top: -220px;
        right: -180px;

        border-radius: 50%;

        background: rgba(16, 185, 129, 0.06);

        filter: blur(10px);

        pointer-events: none;
    }

    .registration-page::after {
        content: "";

        position: absolute;

        width: 300px;
        height: 300px;

        bottom: -160px;
        left: -120px;

        border-radius: 50%;

        background: rgba(59, 130, 246, 0.045);

        filter: blur(15px);

        pointer-events: none;
    }


    /* =========================================================
       MAIN CARD
    ========================================================= */

    .form-card {
        position: relative;

        background: rgba(255, 255, 255, 0.92);

        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);

        border: 1px solid rgba(226, 232, 240, 0.8);

        box-shadow:
            0 20px 45px rgba(15, 23, 42, 0.055),
            0 5px 15px rgba(15, 23, 42, 0.025);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .registration-page h1 {
        letter-spacing: -0.035em;
    }


    /* Badge */

    .registration-page .inline-flex.rounded-full {
        box-shadow:
            0 5px 15px rgba(16, 185, 129, 0.08);
    }


    /* =========================================================
       STEP PROGRESS
    ========================================================= */

    .step-item {
        position: relative;

        transition:
            transform 0.25s ease,
            opacity 0.25s ease;
    }


    .step-circle {
        position: relative;

        width: 44px;
        height: 44px;

        border-radius: 14px !important;

        display: flex;
        align-items: center;
        justify-content: center;

        transition:
            all 0.35s cubic-bezier(.4, 0, .2, 1);

        box-shadow: 0 0 0 transparent;
    }


    .step-item:hover .step-circle {
        transform: translateY(-2px);
    }


    /* Circle aktif */

    #circle-1.bg-emerald-600,
    #circle-2.bg-emerald-600,
    #circle-3.bg-emerald-600 {

        box-shadow:
            0 8px 18px rgba(16, 185, 129, 0.20);

        transform: translateY(-1px);
    }


    /* Garis progress */

    .step-line {
        height: 4px;

        background: #e2e8f0;

        border-radius: 999px;

        overflow: hidden;

        position: relative;
    }


    .step-line.bg-emerald-500 {
        background:
            linear-gradient(
                90deg,
                #10b981,
                #34d399
            );

        box-shadow:
            0 3px 10px rgba(16, 185, 129, 0.15);
    }


    /* =========================================================
       STEP PANEL
    ========================================================= */

    .step-panel {
        display: none;

        animation:
            stepEnter 0.45s cubic-bezier(.22, 1, .36, 1);
    }


    .step-panel.active {
        display: block;
    }


    @keyframes stepEnter {

        from {
            opacity: 0;
            transform:
                translateY(14px)
                scale(.99);
        }

        to {
            opacity: 1;
            transform:
                translateY(0)
                scale(1);
        }

    }


    /* =========================================================
       SECTION HEADER
    ========================================================= */

    .section-icon {
        width: 48px;
        height: 48px;

        border-radius: 15px;

        display: flex;
        align-items: center;
        justify-content: center;

        background:
            linear-gradient(
                145deg,
                #ecfdf5,
                #d1fae5
            );

        color: #059669;

        box-shadow:
            inset 0 0 0 1px rgba(16, 185, 129, 0.08),
            0 6px 15px rgba(16, 185, 129, 0.08);

        transition:
            transform .25s ease,
            box-shadow .25s ease;
    }


    .section-icon:hover {
        transform: translateY(-3px) rotate(-2deg);

        box-shadow:
            inset 0 0 0 1px rgba(16, 185, 129, 0.12),
            0 10px 20px rgba(16, 185, 129, 0.12);
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .input-modern {

        width: 100%;

        min-height: 48px;

        padding:
            13px
            15px;

        border:
            1px solid #e2e8f0;

        border-radius:
            14px;

        background:
            rgba(255, 255, 255, 0.95);

        color:
            #1e293b;

        font-size:
            14px;

        outline:
            none;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease,
            transform .2s ease;
    }


    .input-modern::placeholder {
        color: #94a3b8;
    }


    .input-modern:hover {
        border-color:
            #cbd5e1;

        background:
            #ffffff;
    }


    .input-modern:focus {

        border-color:
            #10b981;

        background:
            #ffffff;

        box-shadow:
            0 0 0 4px rgba(16, 185, 129, 0.08),
            0 5px 15px rgba(15, 23, 42, 0.025);

        transform:
            translateY(-1px);
    }


    textarea.input-modern {
        min-height:
            115px;

        line-height:
            1.6;
    }


    select.input-modern {
        cursor:
            pointer;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .registration-page label {
        letter-spacing:
            -0.01em;
    }


    /* =========================================================
       UPLOAD BOX
    ========================================================= */

    .upload-box {

        position:
            relative;

        padding:
            22px;

        border:
            1.5px dashed #d7dee8;

        border-radius:
            20px;

        background:
            linear-gradient(
                145deg,
                #ffffff,
                #f8fafc
            );

        transition:
            border-color .3s ease,
            background .3s ease,
            transform .3s ease,
            box-shadow .3s ease;
    }


    .upload-box:hover {

        border-color:
            #10b981;

        background:
            linear-gradient(
                145deg,
                #ffffff,
                #f0fdf4
            );

        transform:
            translateY(-3px);

        box-shadow:
            0 12px 25px rgba(15, 23, 42, 0.05);
    }


    .upload-box.has-file {

        border-color:
            #10b981;

        border-style:
            solid;

        background:
            linear-gradient(
                145deg,
                #ffffff,
                #ecfdf5
            );

        box-shadow:
            0 8px 20px rgba(16, 185, 129, 0.08);
    }


    .file-button {

        min-height:
            48px;

        transition:
            all .25s ease;
    }


    .upload-box:hover .file-button {

        border-color:
            #a7f3d0;

        box-shadow:
            0 4px 12px rgba(16, 185, 129, 0.06);
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .registration-page button {

        transition:
            transform .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }


    .registration-page button:not(:disabled):hover {

        transform:
            translateY(-2px);
    }


    .registration-page button:not(:disabled):active {

        transform:
            translateY(0)
            scale(.98);
    }


    /* Tombol hijau */

    .bg-emerald-600 {

        box-shadow:
            0 7px 18px rgba(16, 185, 129, 0.15);
    }


    .bg-emerald-600:hover {

        box-shadow:
            0 10px 24px rgba(16, 185, 129, 0.20);
    }


    /* =========================================================
       SUCCESS ALERT
    ========================================================= */

    .success-alert {

        border-radius:
            18px;

        box-shadow:
            0 8px 25px rgba(16, 185, 129, 0.07);

        animation:
            alertIn .4s cubic-bezier(.22, 1, .36, 1);
    }


    @keyframes alertIn {

        from {
            opacity: 0;
            transform:
                translateY(-10px)
                scale(.98);
        }

        to {
            opacity: 1;
            transform:
                translateY(0)
                scale(1);
        }

    }


    /* =========================================================
       ERROR
    ========================================================= */

    .registration-page .bg-red-50 {

        border-radius:
            18px;

        box-shadow:
            0 8px 20px rgba(239, 68, 68, 0.04);
    }


    /* =========================================================
       BACK BUTTON
    ========================================================= */

    .floating-back {

        transition:
            color .2s ease,
            transform .2s ease;
    }


    .floating-back:hover {

        transform:
            translateX(-4px);
    }


    /* =========================================================
       DIVIDER
    ========================================================= */

    .registration-page .border-t {

        border-color:
            #eef2f7;
    }


    /* =========================================================
       CHECKBOX
    ========================================================= */

    #agreement {

        cursor:
            pointer;

        transition:
            all .2s ease;
    }


    #agreement:checked {

        box-shadow:
            0 0 0 4px rgba(16, 185, 129, .08);
    }


    /* =========================================================
       FOOTER
    ========================================================= */

    .registration-page > div > div:last-child {

        opacity:
            .85;
    }


    /* =========================================================
       SCROLLBAR
    ========================================================= */

    .registration-page ::-webkit-scrollbar {

        width:
            7px;
    }


    .registration-page ::-webkit-scrollbar-track {

        background:
            transparent;
    }


    .registration-page ::-webkit-scrollbar-thumb {

        background:
            #cbd5e1;

        border-radius:
            999px;
    }


    .registration-page ::-webkit-scrollbar-thumb:hover {

        background:
            #94a3b8;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 768px) {

        .registration-page {
            padding-top:
                20px;
            padding-bottom:
                30px;
        }


        .form-card {
            border-radius:
                22px;

            box-shadow:
                0 10px 25px rgba(15, 23, 42, 0.045);
        }


        .step-circle {

            width:
                38px;

            height:
                38px;

            border-radius:
                12px !important;

            font-size:
                13px;
        }


        .step-line {

            margin-left:
                8px;

            margin-right:
                8px;

            height:
                3px;
        }


        .input-modern {

            min-height:
                46px;

            padding:
                11px 13px;

            border-radius:
                13px;
        }


        .upload-box {

            padding:
                18px;

            border-radius:
                17px;
        }


        .section-icon {

            width:
                43px;

            height:
                43px;

            border-radius:
                13px;
        }

    }


    /* =========================================================
       SMALL PHONE
    ========================================================= */

    @media (max-width: 480px) {

        .mobile-padding {

            padding-left:
                12px;

            padding-right:
                12px;
        }


        .form-card {

            border-radius:
                19px;
        }


        .step-label {

            display:
                none;
        }


        .step-circle {

            width:
                36px;

            height:
                36px;
        }


        .step-line {

            margin-left:
                5px;

            margin-right:
                5px;
        }


        .registration-page h1 {

            font-size:
                25px;
        }


        .upload-box {

            padding:
                16px;
        }

    }


    /* =========================================================
       REDUCED MOTION
    ========================================================= */

    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {

            animation-duration:
                0.01ms !important;

            animation-iteration-count:
                1 !important;

            transition-duration:
                0.01ms !important;
        }

    }
</style>
    <div class="registration-page min-h-screen py-6 sm:py-10">

        <div class="max-w-6xl mx-auto mobile-padding">

            {{-- ========================================================= --}}
            {{-- HEADER --}}
            {{-- ========================================================= --}}

            <div class="mb-7">

                <a
                    href="{{ route('dashboard') }}"
                    class="floating-back inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-emerald-600 mb-5"
                >
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Kembali ke Dashboard
                </a>

                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-5">

                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-bold mb-3">
                            <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                            PPDB MI AR-RAWIYAH
                        </div>

                        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-800">
                            Formulir Pendaftaran
                        </h1>

                        <p class="mt-2 text-sm sm:text-base text-slate-500 max-w-2xl">
                            Lengkapi data calon siswa dengan benar. Pastikan data yang
                            dimasukkan sesuai dengan dokumen resmi.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-100 px-4 py-3 form-card">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                                <i data-lucide="shield-check" class="w-5 h-5 text-emerald-600"></i>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">
                                    Status pengisian
                                </p>

                                <p class="text-sm font-bold text-slate-700">
                                    {{ $registration ? 'Draft tersimpan' : 'Belum dimulai' }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            {{-- ========================================================= --}}
            {{-- SUCCESS MESSAGE --}}
            {{-- ========================================================= --}}

            @if (session('success'))
                <div class="success-alert mb-6 flex items-start gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-800">

                    <div class="w-9 h-9 rounded-xl bg-emerald-100 flex items-center justify-center flex-shrink-0">
                        <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600"></i>
                    </div>

                    <div>
                        <p class="font-bold text-sm">
                            Berhasil
                        </p>

                        <p class="text-sm mt-0.5">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            @endif


            {{-- ========================================================= --}}
            {{-- ERROR MESSAGE --}}
            {{-- ========================================================= --}}

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-100">

                    <div class="flex items-start gap-3">

                        <div class="w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                            <i data-lucide="alert-circle" class="w-5 h-5 text-red-600"></i>
                        </div>

                        <div>
                            <p class="font-bold text-sm text-red-700">
                                Ada data yang perlu diperbaiki
                            </p>

                            <ul class="mt-2 space-y-1 text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            @endif


            {{-- ========================================================= --}}
            {{-- PROGRESS --}}
            {{-- ========================================================= --}}

            <div class="bg-white rounded-3xl border border-slate-100 form-card p-5 sm:p-7 mb-6">

                <div class="flex items-center justify-between gap-3">

                    {{-- Step 1 --}}
                    <div class="step-item flex items-center gap-3" data-step="1">

                        <div
                            class="step-circle w-10 h-10 rounded-full flex items-center justify-center bg-emerald-600 text-white font-bold shadow-lg shadow-emerald-200"
                            id="circle-1"
                        >
                            1
                        </div>

                        <div class="step-label">
                            <p class="text-xs text-slate-400">
                                Tahap 1
                            </p>

                            <p class="text-sm font-bold text-slate-700">
                                Data Siswa
                            </p>
                        </div>
                    </div>


                    <div
                        id="line-1"
                        class="step-line flex-1 h-1 bg-slate-100 rounded-full mx-2 sm:mx-5"
                    ></div>


                    {{-- Step 2 --}}
                    <div class="step-item flex items-center gap-3" data-step="2">

                        <div
                            class="step-circle w-10 h-10 rounded-full flex items-center justify-center bg-slate-100 text-slate-400 font-bold"
                            id="circle-2"
                        >
                            2
                        </div>

                        <div class="step-label">
                            <p class="text-xs text-slate-400">
                                Tahap 2
                            </p>

                            <p class="text-sm font-bold text-slate-400" id="label-2">
                                Orang Tua
                            </p>
                        </div>
                    </div>


                    <div
                        id="line-2"
                        class="step-line flex-1 h-1 bg-slate-100 rounded-full mx-2 sm:mx-5"
                    ></div>


                    {{-- Step 3 --}}
                    <div class="step-item flex items-center gap-3" data-step="3">

                        <div
                            class="step-circle w-10 h-10 rounded-full flex items-center justify-center bg-slate-100 text-slate-400 font-bold"
                            id="circle-3"
                        >
                            3
                        </div>

                        <div class="step-label">
                            <p class="text-xs text-slate-400">
                                Tahap 3
                            </p>

                            <p class="text-sm font-bold text-slate-400" id="label-3">
                                Dokumen
                            </p>
                        </div>
                    </div>

                </div>


                <div class="mt-5 flex items-center justify-between text-xs">

                    <span class="text-slate-400">
                        Lengkapi semua data
                    </span>

                    <span
                        id="progress-text"
                        class="font-bold text-emerald-600"
                    >
                        1 dari 3
                    </span>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- FORM --}}
            {{-- ========================================================= --}}

            <form
                id="registrationForm"
                method="POST"
                action="{{ route('pendaftaran.store') }}"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- ===================================================== --}}
                {{-- STEP 1 : DATA SISWA --}}
                {{-- ===================================================== --}}

                <div class="step-panel active" id="step-1">

                    <div class="bg-white rounded-3xl border border-slate-100 form-card overflow-hidden">

                        <div class="p-6 sm:p-8 border-b border-slate-100">

                            <div class="flex items-start gap-4">

                                <div class="section-icon">
                                    <i data-lucide="user-round" class="w-5 h-5"></i>
                                </div>

                                <div>
                                    <h2 class="text-lg font-extrabold text-slate-800">
                                        Identitas Calon Siswa
                                    </h2>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Masukkan identitas siswa sesuai dokumen resmi.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="p-6 sm:p-8">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                {{-- Nama --}}
                                <div class="md:col-span-2">

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Nama Lengkap
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="full_name"
                                        value="{{ old('full_name', $registration?->full_name) }}"
                                        class="input-modern"
                                        placeholder="Masukkan nama lengkap siswa"
                                    >

                                    @error('full_name')
                                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                                    @enderror

                                </div>


                                {{-- Nama panggilan --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Nama Panggilan
                                    </label>

                                    <input
                                        type="text"
                                        name="nickname"
                                        value="{{ old('nickname', $registration?->nickname) }}"
                                        class="input-modern"
                                        placeholder="Contoh: Ahmad"
                                    >

                                </div>


                                {{-- Jenis kelamin --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Jenis Kelamin
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <select name="gender" class="input-modern">

                                        <option value="">
                                            Pilih jenis kelamin
                                        </option>

                                        <option
                                            value="L"
                                            @selected(old('gender', $registration?->gender) === 'L')
                                        >
                                            Laki-laki
                                        </option>

                                        <option
                                            value="P"
                                            @selected(old('gender', $registration?->gender) === 'P')
                                        >
                                            Perempuan
                                        </option>

                                    </select>

                                </div>


                                {{-- Tempat lahir --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Tempat Lahir
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="place_of_birth"
                                        value="{{ old('place_of_birth', $registration?->place_of_birth) }}"
                                        class="input-modern"
                                        placeholder="Contoh: Probolinggo"
                                    >

                                </div>


                                {{-- Tanggal lahir --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Tanggal Lahir
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <input
                                        type="date"
                                        name="date_of_birth"
                                        value="{{ old('date_of_birth', $registration?->date_of_birth?->format('Y-m-d')) }}"
                                        class="input-modern"
                                    >

                                </div>


                                {{-- Agama --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Agama
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <select name="religion" class="input-modern">

                                        <option value="">
                                            Pilih agama
                                        </option>

                                        @foreach ([
                                            'Islam',
                                            'Kristen',
                                            'Katolik',
                                            'Hindu',
                                            'Buddha',
                                            'Konghucu'
                                        ] as $religion)

                                            <option
                                                value="{{ $religion }}"
                                                @selected(old('religion', $registration?->religion) === $religion)
                                            >
                                                {{ $religion }}
                                            </option>

                                        @endforeach

                                    </select>

                                </div>


                                {{-- NISN --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        NISN
                                    </label>

                                    <input
                                        type="text"
                                        name="nisn"
                                        value="{{ old('nisn', $registration?->nisn) }}"
                                        class="input-modern"
                                        placeholder="Masukkan NISN jika sudah memiliki"
                                    >

                                </div>


                                {{-- Nomor HP --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Nomor HP
                                    </label>

                                    <input
                                        type="text"
                                        name="phone"
                                        value="{{ old('phone', $registration?->phone) }}"
                                        class="input-modern"
                                        placeholder="08xxxxxxxxxx"
                                    >

                                </div>


                                {{-- Sekolah sebelumnya --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Asal Sekolah
                                    </label>

                                    <input
                                        type="text"
                                        name="previous_school"
                                        value="{{ old('previous_school', $registration?->previous_school) }}"
                                        class="input-modern"
                                        placeholder="Nama sekolah sebelumnya"
                                    >

                                </div>


                                {{-- Alamat sekolah --}}
                                <div class="md:col-span-2">

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Alamat Sekolah Sebelumnya
                                    </label>

                                    <textarea
                                        name="previous_school_address"
                                        class="input-modern"
                                        placeholder="Masukkan alamat sekolah sebelumnya"
                                    >{{ old('previous_school_address', $registration?->previous_school_address) }}</textarea>

                                </div>


                                {{-- Alamat --}}
                                <div class="md:col-span-2 pt-3">

                                    <div class="flex items-center gap-3 mb-4">

                                        <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center">
                                            <i data-lucide="map-pin" class="w-4 h-4 text-blue-600"></i>
                                        </div>

                                        <div>
                                            <h3 class="font-bold text-slate-800">
                                                Alamat Tempat Tinggal
                                            </h3>

                                            <p class="text-xs text-slate-400">
                                                Isi alamat tempat tinggal siswa
                                            </p>
                                        </div>

                                    </div>

                                </div>


                                <div class="md:col-span-2">

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Alamat Lengkap
                                        <span class="text-red-500">*</span>
                                    </label>

                                    <textarea
                                        name="address"
                                        class="input-modern"
                                        placeholder="Jalan, nomor rumah, dusun, dan keterangan lainnya"
                                    >{{ old('address', $registration?->address) }}</textarea>

                                </div>


                                {{-- RT --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        RT
                                    </label>

                                    <input
                                        type="text"
                                        name="rt"
                                        value="{{ old('rt', $registration?->rt) }}"
                                        class="input-modern"
                                        placeholder="001"
                                    >

                                </div>


                                {{-- RW --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        RW
                                    </label>

                                    <input
                                        type="text"
                                        name="rw"
                                        value="{{ old('rw', $registration?->rw) }}"
                                        class="input-modern"
                                        placeholder="002"
                                    >

                                </div>


                                {{-- Desa --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Desa / Kelurahan
                                    </label>

                                    <input
                                        type="text"
                                        name="village"
                                        value="{{ old('village', $registration?->village) }}"
                                        class="input-modern"
                                        placeholder="Nama desa / kelurahan"
                                    >

                                </div>


                                {{-- Kecamatan --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Kecamatan
                                    </label>

                                    <input
                                        type="text"
                                        name="district"
                                        value="{{ old('district', $registration?->district) }}"
                                        class="input-modern"
                                        placeholder="Nama kecamatan"
                                    >

                                </div>


                                {{-- Kabupaten --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Kabupaten / Kota
                                    </label>

                                    <input
                                        type="text"
                                        name="city"
                                        value="{{ old('city', $registration?->city) }}"
                                        class="input-modern"
                                        placeholder="Nama kabupaten / kota"
                                    >

                                </div>


                                {{-- Provinsi --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Provinsi
                                    </label>

                                    <input
                                        type="text"
                                        name="province"
                                        value="{{ old('province', $registration?->province) }}"
                                        class="input-modern"
                                        placeholder="Nama provinsi"
                                    >

                                </div>


                                {{-- Kode pos --}}
                                <div>

                                    <label class="block text-sm font-bold text-slate-700 mb-2">
                                        Kode Pos
                                    </label>

                                    <input
                                        type="text"
                                        name="postal_code"
                                        value="{{ old('postal_code', $registration?->postal_code) }}"
                                        class="input-modern"
                                        placeholder="Kode pos"
                                    >

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Navigation --}}
                    <div class="flex justify-end mt-5">

                        <button
                            type="button"
                            onclick="nextStep()"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition shadow-lg shadow-emerald-100"
                        >
                            Lanjut ke Data Orang Tua

                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </button>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- STEP 2 : ORANG TUA --}}
                {{-- ===================================================== --}}

                <div class="step-panel" id="step-2">

                    <div class="bg-white rounded-3xl border border-slate-100 form-card overflow-hidden">

                        <div class="p-6 sm:p-8 border-b border-slate-100">

                            <div class="flex items-start gap-4">

                                <div class="section-icon">
                                    <i data-lucide="users-round" class="w-5 h-5"></i>
                                </div>

                                <div>
                                    <h2 class="text-lg font-extrabold text-slate-800">
                                        Data Orang Tua & Wali
                                    </h2>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Masukkan informasi orang tua atau wali siswa.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="p-6 sm:p-8 space-y-8">

                            {{-- AYAH --}}
                            <div>

                                <div class="flex items-center gap-3 mb-5">

                                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                                        <i data-lucide="user-round" class="w-5 h-5 text-blue-600"></i>
                                    </div>

                                    <div>
                                        <h3 class="font-extrabold text-slate-800">
                                            Data Ayah
                                        </h3>

                                        <p class="text-xs text-slate-400">
                                            Informasi ayah kandung
                                        </p>
                                    </div>

                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                    <div class="md:col-span-2">

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Nama Ayah
                                            <span class="text-red-500">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            name="father_name"
                                            value="{{ old('father_name', $registration?->father_name) }}"
                                            class="input-modern"
                                            placeholder="Nama lengkap ayah"
                                        >

                                    </div>


                                    <div>

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Pekerjaan
                                        </label>

                                        <input
                                            type="text"
                                            name="father_occupation"
                                            value="{{ old('father_occupation', $registration?->father_occupation) }}"
                                            class="input-modern"
                                            placeholder="Contoh: Wiraswasta"
                                        >

                                    </div>


                                    <div>

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Nomor HP
                                        </label>

                                        <input
                                            type="text"
                                            name="father_phone"
                                            value="{{ old('father_phone', $registration?->father_phone) }}"
                                            class="input-modern"
                                            placeholder="08xxxxxxxxxx"
                                        >

                                    </div>


                                    <div>

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Pendidikan Terakhir
                                        </label>

                                        <select name="father_education" class="input-modern">

                                            <option value="">
                                                Pilih pendidikan
                                            </option>

                                            @foreach (['SD', 'SMP', 'SMA/SMK', 'D3', 'S1', 'S2', 'S3'] as $education)

                                                <option
                                                    value="{{ $education }}"
                                                    @selected(old('father_education', $registration?->father_education) === $education)
                                                >
                                                    {{ $education }}
                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                            </div>


                            <div class="border-t border-slate-100"></div>


                            {{-- IBU --}}
                            <div>

                                <div class="flex items-center gap-3 mb-5">

                                    <div class="w-10 h-10 rounded-xl bg-pink-50 flex items-center justify-center">
                                        <i data-lucide="heart" class="w-5 h-5 text-pink-600"></i>
                                    </div>

                                    <div>
                                        <h3 class="font-extrabold text-slate-800">
                                            Data Ibu
                                        </h3>

                                        <p class="text-xs text-slate-400">
                                            Informasi ibu kandung
                                        </p>
                                    </div>

                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                    <div class="md:col-span-2">

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Nama Ibu
                                            <span class="text-red-500">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            name="mother_name"
                                            value="{{ old('mother_name', $registration?->mother_name) }}"
                                            class="input-modern"
                                            placeholder="Nama lengkap ibu"
                                        >

                                    </div>


                                    <div>

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Pekerjaan
                                        </label>

                                        <input
                                            type="text"
                                            name="mother_occupation"
                                            value="{{ old('mother_occupation', $registration?->mother_occupation) }}"
                                            class="input-modern"
                                            placeholder="Contoh: Ibu Rumah Tangga"
                                        >

                                    </div>


                                    <div>

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Nomor HP
                                        </label>

                                        <input
                                            type="text"
                                            name="mother_phone"
                                            value="{{ old('mother_phone', $registration?->mother_phone) }}"
                                            class="input-modern"
                                            placeholder="08xxxxxxxxxx"
                                        >

                                    </div>


                                    <div>

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Pendidikan Terakhir
                                        </label>

                                        <select name="mother_education" class="input-modern">

                                            <option value="">
                                                Pilih pendidikan
                                            </option>

                                            @foreach (['SD', 'SMP', 'SMA/SMK', 'D3', 'S1', 'S2', 'S3'] as $education)

                                                <option
                                                    value="{{ $education }}"
                                                    @selected(old('mother_education', $registration?->mother_education) === $education)
                                                >
                                                    {{ $education }}
                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                            </div>


                            <div class="border-t border-slate-100"></div>


                            {{-- WALI --}}
                            <div>

                                <div class="flex items-center gap-3 mb-5">

                                    <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center">
                                        <i data-lucide="contact-round" class="w-5 h-5 text-amber-600"></i>
                                    </div>

                                    <div>
                                        <h3 class="font-extrabold text-slate-800">
                                            Data Wali
                                        </h3>

                                        <p class="text-xs text-slate-400">
                                            Isi jika siswa memiliki wali selain orang tua
                                        </p>
                                    </div>

                                </div>


                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                    <div class="md:col-span-2">

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Nama Wali
                                        </label>

                                        <input
                                            type="text"
                                            name="guardian_name"
                                            value="{{ old('guardian_name', $registration?->guardian_name) }}"
                                            class="input-modern"
                                            placeholder="Nama lengkap wali"
                                        >

                                    </div>


                                    <div>

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Pekerjaan
                                        </label>

                                        <input
                                            type="text"
                                            name="guardian_occupation"
                                            value="{{ old('guardian_occupation', $registration?->guardian_occupation) }}"
                                            class="input-modern"
                                            placeholder="Pekerjaan wali"
                                        >

                                    </div>


                                    <div>

                                        <label class="block text-sm font-bold text-slate-700 mb-2">
                                            Nomor HP
                                        </label>

                                        <input
                                            type="text"
                                            name="guardian_phone"
                                            value="{{ old('guardian_phone', $registration?->guardian_phone) }}"
                                            class="input-modern"
                                            placeholder="08xxxxxxxxxx"
                                        >

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Navigation --}}
                    <div class="flex items-center justify-between gap-3 mt-5">

                        <button
                            type="button"
                            onclick="prevStep()"
                            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold transition"
                        >
                            <i data-lucide="arrow-left" class="w-5 h-5"></i>
                            Kembali
                        </button>

                        <button
                            type="button"
                            onclick="nextStep()"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition shadow-lg shadow-emerald-100"
                        >
                            Lanjut ke Dokumen
                            <i data-lucide="arrow-right" class="w-5 h-5"></i>
                        </button>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- STEP 3 : DOKUMEN --}}
                {{-- ===================================================== --}}

                <div class="step-panel" id="step-3">

                    <div class="bg-white rounded-3xl border border-slate-100 form-card overflow-hidden">

                        <div class="p-6 sm:p-8 border-b border-slate-100">

                            <div class="flex items-start gap-4">

                                <div class="section-icon">
                                    <i data-lucide="files" class="w-5 h-5"></i>
                                </div>

                                <div>
                                    <h2 class="text-lg font-extrabold text-slate-800">
                                        Dokumen Pendaftaran
                                    </h2>

                                    <p class="text-sm text-slate-500 mt-1">
                                        Upload dokumen yang diperlukan untuk proses verifikasi.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="p-6 sm:p-8">

                            {{-- Info --}}
                            <div class="flex gap-3 p-4 rounded-2xl bg-blue-50 border border-blue-100 mb-6">

                                <i data-lucide="info" class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5"></i>

                                <div class="text-sm text-blue-700">

                                    <p class="font-bold mb-1">
                                        Ketentuan upload
                                    </p>

                                    <p>
                                        Foto menggunakan JPG/JPEG/PNG maksimal 2 MB.
                                        Dokumen lainnya dapat berupa JPG, PNG, atau PDF maksimal 4 MB.
                                    </p>

                                </div>

                            </div>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                                {{-- FOTO --}}
                                <div class="upload-box">

                                    <div class="flex items-start gap-4">

                                        <div class="w-11 h-11 rounded-xl bg-emerald-100 flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="image" class="w-5 h-5 text-emerald-600"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <h3 class="font-bold text-slate-800">
                                                Foto Siswa
                                                <span class="text-red-500">*</span>
                                            </h3>

                                            <p class="text-xs text-slate-400 mt-1">
                                                JPG, JPEG, PNG • Maks. 2 MB
                                            </p>

                                        </div>

                                    </div>


                                    <label class="mt-5 block cursor-pointer">

                                        <input
                                            type="file"
                                            name="photo"
                                            accept=".jpg,.jpeg,.png"
                                            class="hidden file-input"
                                        >

                                        <div class="file-button flex items-center justify-between gap-3 px-4 py-3 rounded-xl bg-white border border-slate-200 hover:border-emerald-400 transition">

                                            <span class="file-name text-sm text-slate-400 truncate">
                                                Pilih foto...
                                            </span>

                                            <span class="text-xs font-bold text-emerald-600">
                                                Browse
                                            </span>

                                        </div>

                                    </label>

                                </div>


                                {{-- AKTA --}}
                                <div class="upload-box">

                                    <div class="flex items-start gap-4">

                                        <div class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="file-text" class="w-5 h-5 text-blue-600"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <h3 class="font-bold text-slate-800">
                                                Akta Kelahiran
                                            </h3>

                                            <p class="text-xs text-slate-400 mt-1">
                                                JPG, PNG, PDF • Maks. 4 MB
                                            </p>

                                        </div>

                                    </div>


                                    <label class="mt-5 block cursor-pointer">

                                        <input
                                            type="file"
                                            name="birth_certificate"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            class="hidden file-input"
                                        >

                                        <div class="file-button flex items-center justify-between gap-3 px-4 py-3 rounded-xl bg-white border border-slate-200 hover:border-emerald-400 transition">

                                            <span class="file-name text-sm text-slate-400 truncate">
                                                Pilih dokumen...
                                            </span>

                                            <span class="text-xs font-bold text-emerald-600">
                                                Browse
                                            </span>

                                        </div>

                                    </label>

                                </div>


                                {{-- KK --}}
                                <div class="upload-box">

                                    <div class="flex items-start gap-4">

                                        <div class="w-11 h-11 rounded-xl bg-amber-100 flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="contact" class="w-5 h-5 text-amber-600"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <h3 class="font-bold text-slate-800">
                                                Kartu Keluarga
                                            </h3>

                                            <p class="text-xs text-slate-400 mt-1">
                                                JPG, PNG, PDF • Maks. 4 MB
                                            </p>

                                        </div>

                                    </div>


                                    <label class="mt-5 block cursor-pointer">

                                        <input
                                            type="file"
                                            name="family_card"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            class="hidden file-input"
                                        >

                                        <div class="file-button flex items-center justify-between gap-3 px-4 py-3 rounded-xl bg-white border border-slate-200 hover:border-emerald-400 transition">

                                            <span class="file-name text-sm text-slate-400 truncate">
                                                Pilih dokumen...
                                            </span>

                                            <span class="text-xs font-bold text-emerald-600">
                                                Browse
                                            </span>

                                        </div>

                                    </label>

                                </div>


                                {{-- RAPOR --}}
                                <div class="upload-box">

                                    <div class="flex items-start gap-4">

                                        <div class="w-11 h-11 rounded-xl bg-purple-100 flex items-center justify-center flex-shrink-0">
                                            <i data-lucide="book-open" class="w-5 h-5 text-purple-600"></i>
                                        </div>

                                        <div class="min-w-0 flex-1">

                                            <h3 class="font-bold text-slate-800">
                                                Rapor
                                            </h3>

                                            <p class="text-xs text-slate-400 mt-1">
                                                JPG, PNG, PDF • Maks. 4 MB
                                            </p>

                                        </div>

                                    </div>


                                    <label class="mt-5 block cursor-pointer">

                                        <input
                                            type="file"
                                            name="report_card"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            class="hidden file-input"
                                        >

                                        <div class="file-button flex items-center justify-between gap-3 px-4 py-3 rounded-xl bg-white border border-slate-200 hover:border-emerald-400 transition">

                                            <span class="file-name text-sm text-slate-400 truncate">
                                                Pilih dokumen...
                                            </span>

                                            <span class="text-xs font-bold text-emerald-600">
                                                Browse
                                            </span>

                                        </div>

                                    </label>

                                </div>

                            </div>


                            {{-- Confirmation --}}
                            <div class="mt-7 p-5 rounded-2xl bg-slate-50 border border-slate-200">

                                <label class="flex items-start gap-3 cursor-pointer">

                                    <input
                                        type="checkbox"
                                        id="agreement"
                                        class="mt-1 w-4 h-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500"
                                    >

                                    <span class="text-sm text-slate-600 leading-relaxed">
                                        Saya menyatakan bahwa data yang saya masukkan adalah
                                        benar dan dapat dipertanggungjawabkan. Saya bersedia
                                        mengikuti proses verifikasi yang dilakukan oleh pihak
                                        MI Ar-Rawiyah.
                                    </span>

                                </label>

                            </div>

                        </div>

                    </div>


                    {{-- Navigation --}}
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 mt-5">

                        <button
                            type="button"
                            onclick="prevStep()"
                            class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold transition"
                        >
                            <i data-lucide="arrow-left" class="w-5 h-5"></i>
                            Kembali
                        </button>


                        <div class="flex flex-col sm:flex-row gap-3">

                            <button
                                type="submit"
                                name="action"
                                value="save"
                                class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-900 text-white font-bold transition"
                            >
                                <i data-lucide="save" class="w-5 h-5"></i>
                                Simpan Draft
                            </button>


                            <button
                                type="submit"
                                name="action"
                                value="submit"
                                id="submitButton"
                                class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold transition shadow-lg shadow-emerald-100"
                            >
                                <i data-lucide="send" class="w-5 h-5"></i>
                                Kirim Pendaftaran
                            </button>

                        </div>

                    </div>

                </div>

            </form>


            {{-- ========================================================= --}}
            {{-- FOOTER INFO --}}
            {{-- ========================================================= --}}

            <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-400">

                <div class="flex items-center gap-2">
                    <i data-lucide="lock" class="w-4 h-4"></i>
                    Data pendaftaran dijaga dan digunakan untuk proses penerimaan siswa.
                </div>

                <div>
                    MI Ar-Rawiyah • PPDB
                </div>

            </div>

        </div>

    </div>


    <script>
        lucide.createIcons();

        let currentStep = 1;
        const totalSteps = 3;

        function updateStep() {

            // Panel
            document.querySelectorAll('.step-panel').forEach(panel => {
                panel.classList.remove('active');
            });

            document
                .getElementById(`step-${currentStep}`)
                .classList.add('active');


            // Circle
            for (let i = 1; i <= totalSteps; i++) {

                const circle = document.getElementById(`circle-${i}`);

                if (i <= currentStep) {

                    circle.classList.remove(
                        'bg-slate-100',
                        'text-slate-400'
                    );

                    circle.classList.add(
                        'bg-emerald-600',
                        'text-white'
                    );

                } else {

                    circle.classList.remove(
                        'bg-emerald-600',
                        'text-white'
                    );

                    circle.classList.add(
                        'bg-slate-100',
                        'text-slate-400'
                    );
                }
            }


            // Lines
            for (let i = 1; i <= 2; i++) {

                const line = document.getElementById(`line-${i}`);

                if (i < currentStep) {
                    line.classList.remove('bg-slate-100');
                    line.classList.add('bg-emerald-500');
                } else {
                    line.classList.remove('bg-emerald-500');
                    line.classList.add('bg-slate-100');
                }
            }


            // Labels
            document
                .getElementById('label-2')
                .classList.toggle('text-emerald-600', currentStep >= 2);

            document
                .getElementById('label-2')
                .classList.toggle('text-slate-400', currentStep < 2);

            document
                .getElementById('label-3')
                .classList.toggle('text-emerald-600', currentStep >= 3);

            document
                .getElementById('label-3')
                .classList.toggle('text-slate-400', currentStep < 3);


            document.getElementById('progress-text').textContent =
                `${currentStep} dari ${totalSteps}`;

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });

            lucide.createIcons();
        }


        function nextStep() {

            if (currentStep < totalSteps) {
                currentStep++;
                updateStep();
            }
        }


        function prevStep() {

            if (currentStep > 1) {
                currentStep--;
                updateStep();
            }
        }


        // File name preview
        document.querySelectorAll('.file-input').forEach(input => {

            input.addEventListener('change', function () {

                const box = this.closest('.upload-box');
                const fileName = box.querySelector('.file-name');

                if (this.files.length > 0) {

                    fileName.textContent = this.files[0].name;
                    fileName.classList.remove('text-slate-400');
                    fileName.classList.add(
                        'text-emerald-600',
                        'font-semibold'
                    );

                    box.classList.add('has-file');

                } else {

                    box.classList.remove('has-file');

                }

            });

        });


        // Confirmation saat submit
        document.getElementById('registrationForm')
            .addEventListener('submit', function (event) {

                const submitter = event.submitter;

                if (
                    submitter &&
                    submitter.value === 'submit'
                ) {

                    const agreement =
                        document.getElementById('agreement');

                    if (!agreement.checked) {

                        event.preventDefault();

                        alert(
                            'Silakan centang pernyataan terlebih dahulu sebelum mengirim pendaftaran.'
                        );

                        return;
                    }

                    submitter.disabled = true;

                    submitter.innerHTML = `
                        <svg
                            class="animate-spin w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <circle
                                class="opacity-25"
                                cx="12"
                                cy="12"
                                r="10"
                                stroke="currentColor"
                                stroke-width="4"
                            ></circle>

                            <path
                                class="opacity-75"
                                fill="currentColor"
                                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                            ></path>
                        </svg>

                        Mengirim...
                    `;
                }

            });


        updateStep();
    </script>

</x-app-layout>