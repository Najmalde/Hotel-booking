<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Hotel;


#[Layout('layouts.admin.app')]
class HotelForm extends Component
{
    public $name;
    public $location;
    public $description;
    public $number_of_rooms;
    public $contact_information;

    protected $rules = [
        'name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'description' => 'required|string',
        'number_of_rooms' => 'required|integer|min:1',
        'contact_information' => 'required|string|max:255'
    ];

    public function save()
    {
        $this->validate();

        Hotel::create([
            'name' => $this->name,
            'location' => $this->location,
            'description' => $this->description,
            'number_of_rooms' => $this->number_of_rooms,
            'contact_information' => $this->contact_information
        ]);

        session()->flash('message', 'Hotel created successfully.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.hotel-form');
    }
}
