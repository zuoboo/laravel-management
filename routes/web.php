<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use Database\Seeders\ItemSeeder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('item.index');
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::get('/{item}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
    Route::post('/{item}', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
    Route::get('/{item}', [App\Http\Controllers\ItemController::class, 'show'])->name('item.show');
    Route::delete('/{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');

});

Route::resource('customers', CustomerController::class)->middleware('auth', 'verified');

Route::prefix('deleted-items')->group(function(){
    Route::get('index',[ItemController::class, 'deletedItemIndex'])->name('deleted-items.index');
    Route::post('destroy/{item}', [ItemController::class, 'deletedItemDestroy'])->name('deleted-items.destroy');
    Route::patch('restore/{item}', [ItemController::class, 'deletedItemRestore'])->name('deleted-items.restore');
    Route::get('restore/{item}', [ItemController::class, 'deletedItemRestore'])->name('deleted-items.restore');
});
