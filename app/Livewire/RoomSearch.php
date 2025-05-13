<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Room;
use App\Models\Hotel;


#[Layout('layouts.app')]

class RoomSearch extends Component
{
    public $check_in;
    public $check_out;
    public $hotel_id;
    public $type;
    public $min_price;
    public $max_price = 1000;

    protected $rules = [
        'check_in' => 'required|date|after:yesterday',
        'check_out' => 'required|date|after:check_in',
    ];
    public function search()
    {
        $query = Room::where('status', 'Available')
            ->with('hotel') // Eager load hotel relationship
            ->when($this->hotel_id, fn($q) => $q->where('hotel_id', $this->hotel_id))
            ->when($this->type, fn($q) => $q->where('type', $this->type))
            ->whereBetween('price_per_night', [$this->min_price ?? 0, $this->max_price]);
    
        // Only apply date filter if dates are provided
        if ($this->check_in && $this->check_out) {
            $this->validate([
                'check_in' => 'date|after:yesterday',
                'check_out' => 'date|after:check_in'
            ]);
            
            $query->whereDoesntHave('bookings', function($q) {
                $q->where(function($query) {
                    $query->whereBetween('check_in', [$this->check_in, $this->check_out])
                        ->orWhereBetween('check_out', [$this->check_in, $this->check_out]);
                });
            });
        }
    
        return $query->get();
    }

    public function render()
    {
        
        return view('livewire.room-search', [
            'hotels' => Hotel::all(),
            'types' => Room::distinct()->pluck('type'),
            'rooms' => $this->search()
        ]);
    }
}
