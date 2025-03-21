<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RingsController;
use App\Http\Controllers\RingVariants;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Users::class, 'homepage']);
Route::get('/rings', [RingsController::class, 'show']);
Route::get('/rings/{id}', [RingVariants::class, 'ringsDetails']);

Route::get('/admin/Login', [Users::class, 'adminLoginForm']);
Route::post('/admin/Login', [Users::class, 'adminLogin'])->name('adm');
Route::get('/admin/dashboard', [Users::class, 'dashboard']);
Route::get('/admin/your_products', [RingsController::class, 'index']);
Route::get('/admin/your_products/add_product', [RingsController::class, 'create']);
Route::post('/admin/your_products/add_product', [RingsController::class, 'store'])->name('addp');
Route::get('/admin/your_products/{id}', [RingVariants::class, 'productdet']);
Route::post('/admin/your_products/{id}/add_variation', [RingVariants::class, 'productvardet'])->name('addpd');
Route::get('/admin/sign_out', [Users::class, '']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
