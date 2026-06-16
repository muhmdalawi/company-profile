<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 6px; text-align: left; }
        th { background: #efefef; }
    </style>
</head>
<body>
    <h2>Services Report</h2>
    <table>
        <thead>
            <tr><th>No</th><th>Nama Layanan</th><th>Deskripsi Singkat</th><th>Tanggal Dibuat</th></tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($service->description, 80) }}</td>
                    <td>{{ $service->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
