<?php

use App\Http\Controllers\RingsController;
use App\Http\Controllers\RingVariants;
use App\Http\Controllers\Users;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/register', [Users::class, 'register']);
Route::post('/register', [Users::class, 'store'])->name('reg');
Route::get('/login', [Users::class, 'loginPage']);
Route::post('/login', [Users::class, 'login'])->name('cli');
Route::get('/email/verify', [Users::class, 'emailNotice']);
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::post('/sign_out', [Users::class, ''])->name('logout');
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

Route::middleware('admin')->group(function () {});
