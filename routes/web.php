<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FestivalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/festivals/create', function () {
    return view('festivals.store');
})->middleware(['auth', 'verified'])->name('createFestival');
Route::get('/festivals/application/success', function () {
    return view('applications.success');
})->middleware(['auth', 'verified'])->name('application.success');

Route::resource('festivals', FestivalController::class)
    ->only(['index', 'store','edit','update','destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('applications',\App\Http\Controllers\ApplicationController::class)
    ->only(['index','store'])
    ->middleware(['auth', 'verified']);
Route::get('/applications/create',function (){
    return view('applications.store');
})->middleware(['auth', 'verified'])->name('createApplication');;
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
