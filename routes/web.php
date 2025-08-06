<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Livewire\MultiStep;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('layout.base');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Authentication
// Route::get('login', [AuthenticationController::class,'index'])->name('login');
// Route::post('register',[AuthenticationController::class,'register'])->name('register');


Route::get('step1',[HomeController::class,'home'])->name('step1');
Route::get('step2',[HomeController::class,'step2'])->name('step2');
Route::get('step3',[HomeController::class,'step3'])->name('step3');
Route::post('validateStep1',[HomeController::class,'validateStep1'])->name('validateStep1');
Route::post('validateStep2',[HomeController::class,'validateStep2'])->name('validateStep2');
Route::post('validateStep3',[HomeController::class,'validateStep3'])->name('validateStep3');
Route::get('displayEduction',[HomeController::class,'displayEduction'])->name('displayEduction');
Route::post('deleteEduItem', [HomeController::class, 'deleteEduItem'])->name('deleteEduItem');
Route::get('displayExperience', [HomeController::class, 'displayExperience'])->name('displayExperience');
Route::get('saveData', [HomeController::class, 'create'])->name('saveData');
Route::get('directsaveData', [HomeController::class, 'directsaveData'])->name('directsaveData');
Route::post('SaveData', [HomeController::class, 'create'])->name('SaveData');


// Route::get('multiStep', function () {
//     return view('test');
// });

Route::get('multiStep', MultiStep::class);

Route::get('wizard', function () {
    return view('default');
});

require __DIR__.'/auth.php';
