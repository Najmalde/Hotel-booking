<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Hotel;


#[Layout('layouts.admin.app')]
class RoomForm extends Component
{
    public $hotel_id;
    public $room_number;
    public $type = 'Single';
    public $price_per_night;
    public $status = 'Available';

    protected $rules = [
        'hotel_id' => 'required|exists:hotels,id',
        'room_number' => 'required|string|max:255',
        'type' => 'required|in:Single,Double,Suite,Deluxe',
        'price_per_night' => 'required|numeric|min:0',
        'status' => 'required|in:Available,Booked,Under Maintenance'
    ];

    public function save()
    {
        $this->validate();

        Room::create([
            'hotel_id' => $this->hotel_id,
            'room_number' => $this->room_number,
            'type' => $this->type,
            'price_per_night' => $this->price_per_night,
            'status' => $this->status
        ]);

        session()->flash('message', 'Room created successfully.');
        $this->reset(['room_number', 'price_per_night']);
    }

    public function render()
    {
        return view('livewire.room-form', [
            'hotels' => Hotel::all(),
            'types' => ['Single', 'Double', 'Suite', 'Deluxe'],
            'statuses' => ['Available', 'Booked', 'Under Maintenance']
        ]);
    }
}