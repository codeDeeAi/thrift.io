<?php

use App\Http\Controllers\Thrift\Groups\ThriftGroupController;
use App\Http\Controllers\Thrift\Groups\ThriftRegistrationController;
use App\Http\Controllers\Thrift\Members\ThriftMembersController;
use App\Http\Controllers\Thrift\Settings\ThriftSettingsController;
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

// Thrift registration
Route::get('/group_registration/{token}', [ThriftRegistrationController::class, 'index'])->name('thrift.group.registration');

/**
 *  USER ROUTES
 */

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'thrift'], function () {
        Route::get('/groups', [ThriftGroupController::class, 'index'])->name('user.thrift.groups');
        Route::get('/groups/create', [ThriftGroupController::class, 'create'])->name('user.thrift.groups.create');
        Route::post('/groups/create', [ThriftGroupController::class, 'store'])->name('user.thrift.groups.create');
        Route::get('/group/{token}', [ThriftGroupController::class, 'show'])->name('user.thrift.groups.show');

        Route::group(['prefix' => 'group/{token}'], function () {
            // Views
            Route::get('/members', [ThriftMembersController::class, 'index'])->name('user.thrift.members');
            Route::get('/settings', [ThriftSettingsController::class, 'index'])->name('user.thrift.settings');
            Route::get('/overview', [ThriftSettingsController::class, 'index'])->name('user.thrift.overview');
            Route::get('/activities', [ThriftSettingsController::class, 'index'])->name('user.thrift.activities');

            // Actions
            Route::post('/settings', [ThriftSettingsController::class, 'update'])->name('user.thrift.settings');
        });
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
