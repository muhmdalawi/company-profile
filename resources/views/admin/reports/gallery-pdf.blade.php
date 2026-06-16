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
    <h2>Gallery Report</h2>
    <table>
        <thead>
            <tr><th>No</th><th>Judul</th><th>Tanggal Dibuat</th></tr>
        </thead>
        <tbody>
            @foreach ($galleries as $gallery)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gallery->title }}</td>
                    <td>{{ $gallery->created_at->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
