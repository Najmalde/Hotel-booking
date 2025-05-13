@extends('layouts.admin.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Create New Room</h1>
        <div class="bg-white rounded-lg shadow-md p-6">
            <livewire:room-form />
        </div>
    </div>
@endsection