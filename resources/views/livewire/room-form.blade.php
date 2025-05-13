<!-- resources/views/livewire/room-form.blade.php -->

@vite('resources/css/app.css')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Select Hotel</label>
            <select wire:model="hotel_id" class="w-full p-2 border rounded">
                <option value="">Choose Hotel</option>
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                @endforeach
            </select>
            @error('hotel_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Room Number</label>
            <input type="text" wire:model="room_number" class="w-full p-2 border rounded">
            @error('room_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Room Type</label>
            <select wire:model="type" class="w-full p-2 border rounded">
                @foreach($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
            @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Price per Night</label>
            <input type="number" step="0.01" wire:model="price_per_night" class="w-full p-2 border rounded">
            @error('price_per_night') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Status</label>
            <select wire:model="status" class="w-full p-2 border rounded">
                @foreach($statuses as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Save Room
        </button>
    </form>
</div>