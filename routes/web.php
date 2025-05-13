<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\HotelForm;
use App\Livewire\RoomForm;
use App\Livewire\RoomSearch;
use App\Livewire\BookingForm;
use App\Livewire\BookingReport;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});

//hotel system admin
Route::get('/hotels/create', function () {
    return view('hotel-create');
})->name('hotels.create');

Route::get('/rooms/create', function () {
    return view('room-create');
})->name('rooms.create');

//public ...access user
Route::get('/search', RoomSearch::class)->name('room.search');
Route::get('/book/{room?}', BookingForm::class)->name('booking.form');

// Reporting
Route::get('/reports', BookingReport::class)->name('reports');
Route::get('/reports/pdf', [ReportController::class, 'bookingsPDF'])->name('bookings.pdf'); 