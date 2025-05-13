<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <a href="/admin" class="text-xl font-bold">Hotel System</a>
            <div class="space-x-4">
                <a href="{{ route('hotels.create') }}" class="text-gray-600 hover:text-gray-900">Add Hotel</a>
                <a href="{{ route('rooms.create') }}" class="text-gray-600 hover:text-gray-900">Add Room</a>
                <!--a href="/" class="text-gray-600 hover:text-gray-900">View Site</a-->
                <a href="{{ route('reports') }}" class="text-gray-600 hover:text-gray-900">
                    Reports
                </a>
            </div>
        </div>
    </div>
</nav>