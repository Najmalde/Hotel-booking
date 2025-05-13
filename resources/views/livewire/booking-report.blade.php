<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between mb-6">
        <h2 class="text-2xl font-bold">Booking Reports</h2>
        <button wire:click="exportPDF" class="bg-blue-500 text-white px-4 py-2 rounded">
            Export PDF
        </button>
    </div>

    <div class="mb-4 flex gap-4">
        <input type="date" wire:model="startDate" class="border rounded p-2">
        <input type="date" wire:model="endDate" class="border rounded p-2">
    </div>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-3 text-left">Hotel</th>
                <th class="p-3 text-left">Guest</th>
                <th class="p-3 text-left">Contact</th>
                <th class="p-3 text-left">Room Type</th>
                <th class="p-3 text-left">Check-in</th>
                <th class="p-3 text-left">Check-out</th>
                <th class="p-3 text-left">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr class="border-t">
                    <td class="p-3">{{ $booking->room->hotel->name }}</td>
                    <td class="p-3">{{ $booking->guest_name }}</td>
                    <td class="p-3">
                        {{ $booking->guest_email }}<br>
                        {{ $booking->guest_phone }}
                    </td>
                    <td class="p-3">{{ $booking->room->type }}</td>
                    <td class="p-3">{{ $booking->check_in->format('M d, Y') }}</td>
                    <td class="p-3">{{ $booking->check_out->format('M d, Y') }}</td>
                    <td class="p-3 font-semibold">
                        ${{ number_format($booking->room->price_per_night * $booking->check_in->diffInDays($booking->check_out)) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-3 text-center text-gray-500">No bookings found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>