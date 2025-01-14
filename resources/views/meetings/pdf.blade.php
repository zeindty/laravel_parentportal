<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Request Meeting</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Meeting Request</h1>
    <h3>Periode: {{ $start_date }} sampai {{ $end_date }}</h3>

    @php
        $groupedHistories = $meetings->groupBy('meeting_date');
    @endphp

    @foreach ($groupedHistories as $date => $group)
        <h3>Tanggal: {{ $date }}</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama Orang Tua</th>
                    <th>Nama Guru</th>
                    <th>Tanggal Meeting</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($group as $meeting)
                    <tr>
                        <td>{{ $meeting->user_id }}</td>
                        <td>{{ $meeting->teacher_id }}</td>
                        <td>{{ $meeting->meeting_date }}</td>
                        <td>{{ $meeting->status }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>