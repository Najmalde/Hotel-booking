<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;

#[Layout('layouts.app')]
class BookingForm extends Component
{
    public $room_id;
    public $guest_name;
    public $guest_email;
    public $guest_phone;
    public $check_in;
    public $check_out;
    public $special_requests;
    
    public $roomDetails;

    protected $rules = [
        'room_id' => 'required|exists:rooms,id',
        'guest_name' => 'required|string|max:255',
        'guest_email' => 'required|email',
        'guest_phone' => 'required|string|max:20',
        'check_in' => 'required|date|after:yesterday',
        'check_out' => 'required|date|after:check_in',
    ];

    public function mount($roomId = null)
    {
        if ($roomId) {
            $this->room_id = $roomId;
            $this->loadRoomDetails();
        }
    }

    public function loadRoomDetails()
    {
        $this->roomDetails = Room::with('hotel')->find($this->room_id);
    }

    public function save()
    {
        $this->validate();
        
        // Check availability again
        $isAvailable = !Booking::where('room_id', $this->room_id)
            ->where(function($query) {
                $query->whereBetween('check_in', [$this->check_in, $this->check_out])
                      ->orWhereBetween('check_out', [$this->check_in, $this->check_out]);
            })->exists();

        if (!$isAvailable) {
            return session()->flash('error', 'This room is no longer available for the selected dates.');
        }

        $booking = Booking::create($this->only([
            'room_id', 'guest_name', 'guest_email', 
            'guest_phone', 'check_in', 'check_out', 'special_requests'
        ]));

        // Send confirmation email
        Mail::to($this->guest_email)->send(new BookingConfirmation($booking));

        session()->flash('success', 'Booking confirmed! A confirmation email has been sent.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.booking-form');
    }
}