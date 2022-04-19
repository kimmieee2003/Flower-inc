<?php

use App\Http\Controllers\FlowerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\WarehouseFlowerController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/edit-password', function () {
//    Hash::
    return view('edit-password');
})->middleware(['auth'])->name('edit-password');

Route::post('/change-password', [UserController::class, 'changePassword'])->middleware(['auth'])->name('change-password');
Route::get('/get-stock/{id}', [WarehouseFlowerController::class, 'getStock'])->middleware(['auth'])->name('get-stock');
Route::get('/go-to-add-stock/{id}', [WarehouseFlowerController::class, 'goToAddStock'])->middleware(['auth'])->name('go-to-add-stock');
Route::post('/add-stock/{id}', [WarehouseFlowerController::class, 'addStock'])->middleware(['auth'])->name('add-stock');

Route::get('/get-warehouse/{id}', [FlowerController::class, 'show'])->middleware(['auth'])->name('get-warehouse');

Route::resource('warehouses', WarehouseController::class)->middleware(['auth']);
Route::resource('flowers', FlowerController::class)->middleware(['auth']);
Route::resource('warehouseFlowers', WarehouseFlowerController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
