<!-- resources/views/livewire/hotel-form.blade.php -->
@vite('resources/css/app.css')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Hotel Name</label>
            <input type="text" wire:model="name" class="w-full p-2 border rounded">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Location</label>
            <input type="text" wire:model="location" class="w-full p-2 border rounded">
            @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea wire:model="description" class="w-full p-2 border rounded" rows="3"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Number of Rooms</label>
            <input type="number" wire:model="number_of_rooms" class="w-full p-2 border rounded">
            @error('number_of_rooms') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Contact Information</label>
            <input type="text" wire:model="contact_information" class="w-full p-2 border rounded">
            @error('contact_information') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Save Hotel
        </button>
    </form>
</div>