<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Booking;
use Illuminate\Http\Request;

class ReportController extends Controller
{
   public function bookingsPDF(Request $request)
{
    $bookings = Booking::with(['room.hotel', 'room'])
        ->when($request->start, fn($q) => $q->where('check_in', '>=', $request->start))
        ->when($request->end, fn($q) => $q->where('check_out', '<=', $request->end))
        ->get();

    $pdf = PDF::loadView('pdf.admin-bookings', compact('bookings'));
    return $pdf->download('admin-bookings-'.now()->format('Ymd').'.pdf');
}
}