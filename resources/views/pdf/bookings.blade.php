
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ddd; }
        th { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <h1>Booking Report - {{ now()->format('M d, Y') }}</h1>
    
    <table>
        <thead>
            <tr>
                <th>Hotel</th>
                <th>Guest</th>
                <th>Contact</th>
                <th>Room Type</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->room->hotel->name }}</td>
                    <td>{{ $booking->guest_name }}</td>
                    <td>
                        {{ $booking->guest_email }}<br>
                        {{ $booking->guest_phone }}
                    </td>
                    <td>{{ $booking->room->type }}</td>
                    <td>{{ $booking->check_in->format('M d, Y') }}</td>
                    <td>{{ $booking->check_out->format('M d, Y') }}</td>
                    <td>${{ number_format($booking->room->price_per_night * $booking->check_in->diffInDays($booking->check_out)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

    