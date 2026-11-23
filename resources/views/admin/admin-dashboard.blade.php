```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | MI Arrawiyah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #1e293b;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #172554;
            color: white;
            padding: 25px 18px;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
        }

        .brand {
            padding: 5px 10px 30px;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .brand h2 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .brand p {
            font-size: 12px;
            color: #cbd5e1;
        }

        .menu-title {
            font-size: 11px;
            color: #94a3b8;
            margin: 28px 10px 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .menu a {
            display: block;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 9px;
            color: #dbeafe;
            text-decoration: none;
            font-size: 14px;
            transition: .2s;
        }

        .menu a:hover,
        .menu a.active {
            background: #2563eb;
            color: white;
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout button {
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 9px;
            background: #dc2626;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        /* MAIN */
        .main {
            margin-left: 250px;
            width: calc(100% - 250px);
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 15px;
        }

        .topbar h1 {
            font-size: 25px;
        }

        .topbar p {
            color: #64748b;
            font-size: 14px;
            margin-top: 5px;
        }

        .admin-profile {
            background: white;
            padding: 10px 15px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,.04);
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #dbeafe;
            color: #1d4ed8;
            display: grid;
            place-items: center;
            font-weight: bold;
        }

        .admin-profile strong {
            font-size: 13px;
        }

        .admin-profile small {
            display: block;
            color: #64748b;
            font-size: 11px;
            margin-top: 3px;
        }

        /* WELCOME */
        .welcome {
            background: linear-gradient(120deg, #1e40af, #3b82f6);
            color: white;
            padding: 28px;
            border-radius: 16px;
            margin-bottom: 25px;
        }

        .welcome h2 {
            font-size: 22px;
            margin-bottom: 8px;
        }

        .welcome p {
            font-size: 14px;
            color: #dbeafe;
            line-height: 1.6;
        }

        /* STATISTICS */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(0,0,0,.035);
        }

        .stat-card p {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .stat-card h2 {
            font-size: 28px;
            color: #1e293b;
        }

        .stat-card span {
            display: block;
            margin-top: 8px;
            font-size: 11px;
            color: #94a3b8;
        }

        /* CONTENT */
        .content-card {
            background: white;
            padding: 24px;
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(0,0,0,.035);
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 10px;
        }

        .content-header h3 {
            font-size: 17px;
        }

        .content-header a {
            color: #2563eb;
            text-decoration: none;
            font-size: 13px;
        }

        .empty {
            text-align: center;
            padding: 35px 10px;
            color: #94a3b8;
            font-size: 14px;
        }

        footer {
            margin-top: 25px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                width: 75px;
                padding: 20px 10px;
            }

            .brand {
                padding: 5px 0 20px;
                text-align: center;
            }

            .brand h2 {
                font-size: 11px;
            }

            .brand p,
            .menu-title,
            .menu a span,
            .logout button span {
                display: none;
            }

            .menu a {
                text-align: center;
                padding: 14px 5px;
                font-size: 18px;
            }

            .logout {
                left: 10px;
                right: 10px;
            }

            .logout button {
                font-size: 17px;
                padding: 12px 5px;
            }

            .main {
                margin-left: 75px;
                width: calc(100% - 75px);
                padding: 18px 13px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .topbar h1 {
                font-size: 21px;
            }

            .welcome {
                padding: 22px 18px;
            }

            .welcome h2 {
                font-size: 19px;
            }

            .stats {
                gap: 10px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-card h2 {
                font-size: 23px;
            }

            .content-card {
                padding: 17px;
            }
        }
    </style>
</head>

<body>
<div class="wrapper">

    <aside class="sidebar">
        <div class="brand">
            <h2>MI ARRAWIYAH</h2>
            <p>Panel Administrator</p>
        </div>

        <div class="menu-title">Menu Utama</div>

        <nav class="menu">
            <a href="{{ route('admin.dashboard') }}" class="active">
                🏠 <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.registrations.index') }}">
    📋 <span>Data Pendaftaran</span>
</a>

            <a href="#">
                👨‍🎓 <span>Data Siswa</span>
            </a>

            <a href="#">
                💳 <span>Pembayaran</span>
            </a>

            <a href="#">
                ⚙️ <span>Pengaturan</span>
            </a>
        </nav>

        <div class="logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">↪ <span>Keluar</span></button>
            </form>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <h1>Dashboard Admin</h1>
                <p>Ringkasan pengelolaan PPDB MI Arrawiyah</p>
            </div>

            <div class="admin-profile">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <strong>{{ auth()->user()->name }}</strong>
                    <small>Administrator</small>
                </div>
            </div>
        </header>

        <section class="welcome">
            <h2>Selamat datang, {{ auth()->user()->name }}!</h2>
            <p>
                Selamat bekerja. Kelola pendaftaran calon siswa baru
                MI Arrawiyah melalui halaman administrator ini.
            </p>
        </section>

        <section class="stats">
            <div class="stat-card">
                <p>Total Pendaftar</p>
                <h2>{{ $totalRegistrations }}</h2>
                <span>Seluruh pendaftaran</span>
            </div>

            <div class="stat-card">
                <p>Menunggu Verifikasi</p>
                <h2>{{ $pendingRegistrations }}</h2>
                <span>Pendaftaran perlu diperiksa</span>
            </div>

            <div class="stat-card">
                <p>Diterima</p>
                <h2>{{ $acceptedRegistrations }}</h2>
                <span>Calon siswa diterima</span>
            </div>

            <div class="stat-card">
                <p>Ditolak</p>
                <h2>{{ $rejectedRegistrations }}</h2>
                <span>Pendaftaran ditolak</span>
            </div>
        </section>

        <section class="content-card">
            <div class="content-header">
                <h3>Aktivitas Pendaftaran Terbaru</h3>
                <a href="#">Lihat semua</a>
            </div>

            <div class="empty">
                Belum ada aktivitas pendaftaran.
            </div>
        </section>

        <footer>
            &copy; {{ date('Y') }} MI Arrawiyah. Panel Administrator.
        </footer>

    </main>
</div>
</body>
</html>
```