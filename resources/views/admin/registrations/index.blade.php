
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran | Admin MI Arrawiyah</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #1e293b;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 30px 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 25px;
        }

        .header p {
            color: #64748b;
            font-size: 14px;
            margin-top: 6px;
        }

        .back {
            text-decoration: none;
            color: #2563eb;
            font-size: 14px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(0,0,0,.04);
        }

        .filters {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        input, select {
            padding: 11px 13px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            outline: none;
            background: white;
            font-size: 13px;
        }

        input {
            flex: 1;
            min-width: 0;
        }

        button {
            border: none;
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            border-radius: 8px;
            cursor: pointer;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            padding: 15px 12px;
            border-bottom: 1px solid #f1f5f9;
            text-align: left;
            font-size: 13px;
        }

        th {
            color: #64748b;
            font-weight: 600;
            background: #f8fafc;
        }

        .name {
            font-weight: 600;
        }

        .email {
            color: #94a3b8;
            font-size: 11px;
            margin-top: 4px;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .draft {
            background: #f1f5f9;
            color: #64748b;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .verified {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .accepted {
            background: #d1fae5;
            color: #047857;
        }

        .rejected {
            background: #ffe4e6;
            color: #be123c;
        }

        .empty {
            text-align: center;
            padding: 40px 10px;
            color: #94a3b8;
        }

        .pagination {
            margin-top: 20px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px 12px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            .header h1 {
                font-size: 21px;
            }

            .card {
                padding: 15px;
            }

            .filters {
                flex-direction: column;
            }

            .filters button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <div class="header">
        <div>
            <h1>Data Pendaftaran</h1>
            <p>Daftar calon siswa baru MI Arrawiyah</p>
        </div>

        <a class="back" href="{{ route('admin.dashboard') }}">
            ← Kembali ke Dashboard
        </a>
    </div>

    <div class="card">

        <form action="{{ route('admin.registrations.index') }}"
              method="GET"
              class="filters">

            <input
                type="text"
                name="search"
                placeholder="Cari nama siswa atau NISN..."
                value="{{ request('search') }}"
            >

            <select name="status">
                <option value="">Semua Status</option>
                <option value="draft" @selected(request('status') === 'draft')>Draft</option>
                <option value="pending" @selected(request('status') === 'pending')>Menunggu Verifikasi</option>
                <option value="verified" @selected(request('status') === 'verified')>Terverifikasi</option>
                <option value="accepted" @selected(request('status') === 'accepted')>Diterima</option>
                <option value="rejected" @selected(request('status') === 'rejected')>Ditolak</option>
            </select>

            <button type="submit">Cari</button>
        </form>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Calon Siswa</th>
                        <th>NISN</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th>Aksi / Ubah Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($registrations as $registration)
                        <tr>
                            <td>{{ $registrations->firstItem() + $loop->index }}</td>

                            <td>
                                <div class="name">
                                    {{ $registration->full_name }}
                                </div>

                                <div class="email">
                                    {{ $registration->user?->email ?? '-' }}
                                </div>
                            </td>

                            <td>{{ $registration->nisn ?? '-' }}</td>

                            <td>
                                {{ $registration->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </td>

                            <td>
                                {{ $registration->submitted_at?->format('d M Y') ?? '-' }}
                            </td>

                            <td>
                                <span class="badge {{ $registration->status }}">
                                    {{ $registration->status_label }}
                                </span>
                            </td>
                           <td>
    <a href="{{ route('admin.registrations.show', $registration->id) }}"
       class="btn-detail">
        Detail
    </a>

    <form action="{{ route('admin.registrations.update-status', $registration->id) }}"
          method="POST"
          style="margin-top: 10px;">

        @csrf
        @method('PATCH')

        <select name="status" required>
            <option value="pending"
                {{ $registration->status === 'pending' ? 'selected' : '' }}>
                Menunggu Verifikasi
            </option>

            <option value="verified"
                {{ $registration->status === 'verified' ? 'selected' : '' }}>
                Terverifikasi
            </option>

            <option value="accepted"
                {{ $registration->status === 'accepted' ? 'selected' : '' }}>
                Diterima
            </option>

            <option value="rejected"
                {{ $registration->status === 'rejected' ? 'selected' : '' }}>
                Ditolak
            </option>
        </select>

        <textarea name="admin_notes"
                  placeholder="Catatan admin..."
                  rows="2"
                  style="width: 150px; margin-top: 6px;">{{ $registration->admin_notes }}</textarea>

        <button type="submit" style="margin-top: 6px;">
            Simpan Status
        </button>
    </form>
</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Belum ada data pendaftaran.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $registrations->links() }}
        </div>

    </div>
</div>
</body>
</html>
