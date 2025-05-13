<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmed!</h1>
    <p>Hello {{ $booking->guest_name }},</p>
    
    <p>Your booking details:</p>
    <ul>
        <li>Hotel: {{ $booking->room->hotel->name }}</li>
        <li>Room: {{ $booking->room->room_number }} ({{ $booking->room->type }})</li>
        <li>Check-in: {{ $booking->check_in->format('M j, Y') }}</li>
        <li>Check-out: {{ $booking->check_out->format('M j, Y') }}</li>
    </ul>
</body>
</html>