<?php

namespace App\Livewire;

use Livewire\Component;
//use Livewire\Attributes\Layout;
use App\Models\Booking;


//#[Layout('layouts.admin.app')]
class BookingReport extends Component
{
    public $startDate;
    public $endDate;

    public function render()
    {
        $bookings = Booking::with(['room.hotel', 'room'])
            ->when($this->startDate, fn($q) => $q->where('check_in', '>=', $this->startDate))
            ->when($this->endDate, fn($q) => $q->where('check_out', '<=', $this->endDate))
            ->get();

        return view('livewire.booking-report', compact('bookings'));
    }

    public function exportPDF()
    {
        return redirect()->route('bookings.pdf', [
            'start' => $this->startDate,
            'end' => $this->endDate
        ]);
    }
}
