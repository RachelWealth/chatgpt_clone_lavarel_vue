<?php

use App\Http\Controllers\ChatgptIndexController;
use App\Http\Controllers\ChatGptStoreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canChat' => Route::has('chat.show'),
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/chat/{id?}', function ($id = null) {
        if ($id === null) {
            return redirect()->route('chat.show', ['id' => 0]);
        }
    
        return (new ChatgptIndexController())-> __invoke($id);
    })->name('chat.show');
    Route::post('/chat/{id?}',ChatGptStoreController::class)->name('chat.store');

    });

require __DIR__.'/auth.php';
