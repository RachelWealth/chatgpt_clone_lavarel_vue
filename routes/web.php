<?php

use App\Http\Controllers\ChatGptDestroyController;
use App\Http\Controllers\ChatgptIndexController;
use App\Http\Controllers\ChatGptStoreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Chat;

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/chat/{id?}', function ($id = null) {
        if ($id === null) {
            $highestId = Chat::max('id');
            return redirect()->route('chat.show', ['id' => $highestId]);
        }
        return (new ChatgptIndexController())-> __invoke($id);
    })->name('chat.show');
    
    Route::post('/chat/{id?}',ChatGptStoreController::class)->name('chat.store');
    Route::delete('/chat/{chat?}', ChatGptDestroyController::class)->name('chat.destroy');
    
    });

require __DIR__.'/auth.php';
