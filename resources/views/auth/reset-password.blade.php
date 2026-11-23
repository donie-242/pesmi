<x-guest-layout>

    <div style="
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: #f8fbff;
        font-family: 'Plus Jakarta Sans', sans-serif;
    ">

        <div style="
            width: 100%;
            max-width: 450px;
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(15, 23, 42, .08);
        ">

            <h2 style="
                margin: 0 0 10px;
                color: #0f172a;
            ">
                Buat Password Baru
            </h2>

            <p style="
                color: #64748b;
                font-size: 14px;
                line-height: 1.7;
                margin-bottom: 25px;
            ">
                Masukkan password baru untuk akun kamu.
            </p>

            @if ($errors->any())
                <div style="
                    padding: 12px 15px;
                    margin-bottom: 20px;
                    border-radius: 12px;
                    background: #fef2f2;
                    color: #dc2626;
                    font-size: 13px;
                ">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}">

                @csrf

                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}"
                >

                <div style="margin-bottom: 18px;">
                    <label
                        for="email"
                        style="
                            display: block;
                            margin-bottom: 8px;
                            font-size: 13px;
                            font-weight: 700;
                            color: #334155;
                        "
                    >
                        Email
                    </label>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email', $request->email) }}"
                        required
                        autofocus
                        style="
                            width: 100%;
                            height: 50px;
                            padding: 0 15px;
                            border: 1px solid #e2e8f0;
                            border-radius: 13px;
                            box-sizing: border-box;
                        "
                    >
                </div>

                <div style="margin-bottom: 18px;">
                    <label
                        for="password"
                        style="
                            display: block;
                            margin-bottom: 8px;
                            font-size: 13px;
                            font-weight: 700;
                            color: #334155;
                        "
                    >
                        Password Baru
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Minimal 8 karakter"
                        style="
                            width: 100%;
                            height: 50px;
                            padding: 0 15px;
                            border: 1px solid #e2e8f0;
                            border-radius: 13px;
                            box-sizing: border-box;
                        "
                    >
                </div>

                <div style="margin-bottom: 20px;">
                    <label
                        for="password_confirmation"
                        style="
                            display: block;
                            margin-bottom: 8px;
                            font-size: 13px;
                            font-weight: 700;
                            color: #334155;
                        "
                    >
                        Konfirmasi Password
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Ulangi password baru"
                        style="
                            width: 100%;
                            height: 50px;
                            padding: 0 15px;
                            border: 1px solid #e2e8f0;
                            border-radius: 13px;
                            box-sizing: border-box;
                        "
                    >
                </div>

                <button
                    type="submit"
                    style="
                        width: 100%;
                        height: 50px;
                        border: none;
                        border-radius: 13px;
                        background: #2563eb;
                        color: white;
                        font-weight: 700;
                        cursor: pointer;
                    "
                >
                    Simpan Password Baru
                </button>

            </form>

        </div>

    </div>

</x-guest-layout>