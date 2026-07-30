<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ItemPenjualanController;


/*
|--------------------------------------------------------------------------
| Guest
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'index'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'auth'])
        ->name('login.post');

});


/*
|--------------------------------------------------------------------------
| Semua user yang sudah login
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');



    /*
    |--------------------------------------------------------------------------
    | User Management (Admin)
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')->group(function () {


        Route::get('/user', [UserController::class, 'index'])
            ->name('user.index');


        Route::get('/user/create', [UserController::class, 'create'])
            ->name('user.create');


        Route::post('/user/store', [UserController::class, 'store'])
            ->name('user.store');


        Route::get('/user/{user}/edit', [UserController::class, 'edit'])
            ->name('user.edit');


        Route::put('/user/{user}', [UserController::class, 'update'])
            ->name('user.update');


        Route::delete('/user/{user}', [UserController::class, 'destroy'])
            ->name('user.destroy');

    });



    /*
|--------------------------------------------------------------------------
| Produk
|--------------------------------------------------------------------------
*/

Route::middleware('role:admin,kasir')->group(function () {

    // Menampilkan semua produk
    Route::get('/produk', [ProdukController::class, 'index'])
        ->name('produk.index');


    // Form tambah produk
    Route::get('/produk/create', [ProdukController::class, 'create'])
        ->name('produk.create');


    // Simpan produk baru
    Route::post('/produk', [ProdukController::class, 'store'])
        ->name('produk.store');


    // Detail produk
    Route::get('/produk/{id}', [ProdukController::class, 'show'])
        ->name('produk.show');


    // Form edit produk
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])
        ->name('produk.edit');


    // Update produk
    Route::put('/produk/{id}', [ProdukController::class, 'update'])
        ->name('produk.update');


    // Hapus produk
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])
        ->name('produk.destroy');

});



    /*
    |--------------------------------------------------------------------------
    | Penjualan
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin,kasir')->group(function () {


        Route::get('/penjualan', [PenjualanController::class, 'index'])
            ->name('penjualan.index');


        Route::get('/penjualan/create', [PenjualanController::class, 'create'])
            ->name('penjualan.create');


        Route::post('/penjualan', [PenjualanController::class, 'store'])
            ->name('penjualan.store');


        Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])
            ->name('penjualan.show');


        Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])
            ->name('penjualan.destroy');


    });



    /*
    |--------------------------------------------------------------------------
    | Item Penjualan
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin,kasir')->group(function () {


        Route::resource('itempenjualan', ItemPenjualanController::class);


    });


});