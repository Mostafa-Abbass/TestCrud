<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserRoleController;

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


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// // Super Admin and Admin can manage products
// Route::group(['middleware' => ['auth', 'role:super-admin|admin']], function() {
//     Route::resource('products', ProductController::class)->except(['index', 'show']);
// });

// // Customer and all other authenticated users can view products
// Route::group(['middleware' => ['auth']], function() {
//     Route::get('products', [ProductController::class, 'index'])->name('products.index');
//     Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
// });

// // Super Admin can manage user roles
// Route::group(['middleware' => ['auth', 'role:super-admin']], function() {
//     Route::get('/users', [UserRoleController::class, 'index'])->name('users.index');
//     Route::get('/user-roles/{user}/edit', [UserRoleController::class, 'edit'])->name('user_roles.edit');
//     Route::put('/user-roles/{user}', [UserRoleController::class, 'update'])->name('user_roles.update');
// });

// require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Super Admin and Admin can manage products
Route::group(['middleware' => ['auth', 'role:super-admin|admin']], function() {
    Route::resource('products', ProductController::class)->except(['index', 'show']);
});

// Customer and all other authenticated users can view products
Route::group(['middleware' => ['auth']], function() {
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
});

// Super Admin can manage user roles
Route::group(['middleware' => ['auth', 'role:super-admin']], function() {
    // Define both routes to point to the same controller method
    Route::get('/users', [UserRoleController::class, 'index'])->name('users.index');
    Route::get('/user-roles', [UserRoleController::class, 'index'])->name('user_roles.index');

    Route::get('/user-roles/{user}/edit', [UserRoleController::class, 'edit'])->name('user_roles.edit');
    Route::put('/user-roles/{user}', [UserRoleController::class, 'update'])->name('user_roles.update');
});


// Route::get('/users', [UserRoleController::class, 'index'])->name('users.index');

require __DIR__.'/auth.php';
