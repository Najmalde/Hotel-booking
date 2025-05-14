
<div class="max-w-7xl mx-auto py-8">
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form wire:submit.prevent="search">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label>Hotel</label>
                    <select wire:model="hotel_id" class="w-full border rounded p-2">
                        <option value="">All Hotels</option>
                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label>Room Type</label>
                    <select wire:model="type" class="w-full border rounded p-2">
                        <option value=""> Types</option>
                        @foreach($types as $type)
                            <option>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Price Range (per night)</label>
                    <input type="range" wire:model="max_price" min="0" max="1000" 
                           class="w-full mt-2">
                    <span>$0 - ${{ $max_price }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label>Check-in</label>
                    <input type="date" wire:model="check_in" class="w-full border rounded p-2">
                </div>
                
                <div>
                    <label>Check-out</label>
                    <input type="date" wire:model="check_out" class="w-full border rounded p-2">
                </div>
            </div>

            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
                Search Rooms
            </button>
        </form>
    </div>

    @if($rooms->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($rooms as $room)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-xl font-bold">{{ $room->hotel->name }}</h3>
                    <p class="text-gray-600">{{ $room->type }} Room</p>
                    <p class="text-2xl font-bold">${{ $room->price_per_night }}/night</p>
                    <button wire:click="$dispatch('roomSelected', { roomId: {{ $room->id }} })" 
                            class="mt-2 bg-green-500 text-white px-4 py-2 rounded">
                        Book Now
                    </button>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white p-4 rounded-lg shadow-md">
            No rooms available matching your criteria.
        </div>
    @endif
</div>