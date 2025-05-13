<div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
    @if($roomDetails)
        <div class="mb-6 p-4 border rounded">
            <h3 class="text-xl font-bold">{{ $roomDetails->hotel->name }}</h3>
            <p>Room {{ $roomDetails->room_number }} ({{ $roomDetails->type }})</p>
            <p>${{ $roomDetails->price_per_night }} per night</p>
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label>Guest Name</label>
                <input type="text" wire:model="guest_name" class="w-full border rounded p-2">
            </div>
            
            <div>
                <label>Email</label>
                <input type="email" wire:model="guest_email" class="w-full border rounded p-2">
            </div>

            <div>
                <label>Phone</label>
                <input type="text" wire:model="guest_phone" class="w-full border rounded p-2">
            </div>

            <div>
                <label>Check-in</label>
                <input type="date" wire:model="check_in" class="w-full border rounded p-2">
            </div>

            <div>
                <label>Check-out</label>
                <input type="date" wire:model="check_out" class="w-full border rounded p-2">
            </div>
        </div>

        <div class="mt-4">
            <label>Special Requests</label>
            <textarea wire:model="special_requests" class="w-full border rounded p-2" rows="3"></textarea>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
            Complete Booking
        </button>
    </form>
</div>