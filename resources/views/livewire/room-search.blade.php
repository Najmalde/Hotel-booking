<div class="max-w-7xl mx-auto py-8">
    @if($rooms->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($rooms as $room)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <h3 class="text-xl font-bold">
                        {{ $room->hotel->name ?? 'No Hotel' }}
                    </h3>
                    <p class="text-gray-600">{{ $room->type }} Room</p>
                    <p class="text-lg font-semibold">
                        ${{ number_format($room->price_per_night) }}/night
                    </p>
                    <p class="text-sm {{ $room->status === 'Available' ? 'text-green-600' : 'text-red-600' }}">
                        Status: {{ $room->status }}
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white p-4 rounded-lg shadow-md">
            @if($rooms === null)
                Please initiate a search
            @else
                No rooms found matching your criteria
            @endif
        </div>
    @endif
</div>