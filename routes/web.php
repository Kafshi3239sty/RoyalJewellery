<?php

use App\Http\Controllers\Users;
use App\Models\User;
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
Route::get('/rings', [Users::class, 'ringsSection']);
Route::get('/admin/Login', [Users::class, 'adminLoginForm']);
Route::post('/admin/Login', [Users::class, 'adminLogin'])->name('adm');

Route::middleware('admin')->group(function(){
    Route::get('/admin/dashboard', [Users::class, 'dashboard']);
});