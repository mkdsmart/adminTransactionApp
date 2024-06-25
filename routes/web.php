<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})-> name('welcome');
Route::view('/addmember', 'addmember')->name('addmember');
Route::post('/addmember', [TransactionController::class, 'add'])
->name('addmember');
// Route::post('/filter', [TransactionController::class, 'filter'])-> name('filter');
Route::post('/modify', [TransactionController::class, 'modify'])-> name('modify');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/transactiontable', [TransactionController::class, 'viewtransaction'])-> name('transactiontable');
Route::post('/transactiontable', [TransactionController::class, 'viewtransaction'])-> name('transactiontable');

Route::get('/clientinfo', [TransactionController::class, 'viewclient'])->name('viewclient');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
