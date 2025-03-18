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
Route::get('/rings/{id}', [Users::class, 'ringsDetails']);

Route::get('/admin/Login', [Users::class, 'adminLoginForm']);
Route::post('/admin/Login', [Users::class, 'adminLogin'])->name('adm');
Route::get('/admin/dashboard', [Users::class, 'dashboard']);
Route::get('/admin/your_products', [Users::class, 'products']);
Route::get('/admin/your_products/add_product', [Users::class, 'addproduct']);
Route::post('/admin/your_products/add_product', [Users::class, 'submitproduct'])->name('addp');
Route::get('/admin/your_products/{id}', [Users::class, 'productdet']);
Route::post('/admin/your_products/{id}/add_variation', [Users::class, 'productvardet'])->name('addpd');
Route::get('/admin/sign_out', [Users::class, '']);

Route::middleware('admin')->group(function(){
    
});