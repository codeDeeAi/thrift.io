<?php

use App\Http\Controllers\Thrift\Groups\ThriftGroupController;
use Illuminate\Support\Facades\Route;

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

/**
 *  GUEST ROUTES
 */
Route::get('/', function () {
    return view('guest.home');
});

/**
 *  USER ROUTES
 */

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'thrift'], function () {
        Route::get('/groups', [ThriftGroupController::class, 'index'])->name('user.thrift.groups');
    });
});

/**
 *  ADMIN ROUTES
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');
});


require __DIR__ . '/auth.php';
