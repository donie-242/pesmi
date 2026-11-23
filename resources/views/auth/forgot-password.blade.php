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
                Lupa Password?
            </h2>

            <p style="
                color: #64748b;
                font-size: 14px;
                line-height: 1.7;
                margin-bottom: 25px;
            ">
                Masukkan email akun kamu. Kami akan mengirimkan
                link untuk membuat password baru.
            </p>

            @if (session('status'))
                <div style="
                    padding: 12px 15px;
                    margin-bottom: 20px;
                    border-radius: 12px;
                    background: #f0fdf4;
                    color: #15803d;
                    font-size: 13px;
                ">
                    {{ session('status') }}
                </div>
            @endif

            @error('email')
                <div style="
                    padding: 12px 15px;
                    margin-bottom: 20px;
                    border-radius: 12px;
                    background: #fef2f2;
                    color: #dc2626;
                    font-size: 13px;
                ">
                    {{ $message }}
                </div>
            @enderror

            <form method="POST" action="{{ route('password.email') }}">

                @csrf

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
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="Masukkan email kamu"
                    style="
                        width: 100%;
                        height: 50px;
                        padding: 0 15px;
                        border: 1px solid #e2e8f0;
                        border-radius: 13px;
                        outline: none;
                        box-sizing: border-box;
                    "
                >

                <button
                    type="submit"
                    style="
                        width: 100%;
                        height: 50px;
                        margin-top: 20px;
                        border: none;
                        border-radius: 13px;
                        background: #2563eb;
                        color: white;
                        font-weight: 700;
                        cursor: pointer;
                    "
                >
                    Kirim Link Reset
                </button>

            </form>

            <div style="
                text-align: center;
                margin-top: 20px;
            ">
                <a
                    href="{{ route('login') }}"
                    style="
                        color: #2563eb;
                        text-decoration: none;
                        font-size: 13px;
                        font-weight: 700;
                    "
                >
                    ← Kembali ke Login
                </a>
            </div>

        </div>

    </div>

</x-guest-layout>