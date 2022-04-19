<?php

use App\Http\Controllers\Dashboards\UserDashboard;
use App\Http\Controllers\Thrift\Activities\ThriftActivityController;
use App\Http\Controllers\Thrift\Groups\ThriftGroupController;
use App\Http\Controllers\Thrift\Groups\ThriftRegistrationController;
use App\Http\Controllers\Thrift\Members\ThriftMembersController;
use App\Http\Controllers\Thrift\Settings\ThriftSettingsController;
use App\Http\Controllers\Thrift\Slots\ThriftSlotController;
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

// Pricing
Route::view('/pricing', 'guest.pricing.pricing')->name('pricing');

// Thrift registration
Route::get('/group_registration/{token}', [ThriftRegistrationController::class, 'index'])->name('thrift.group.registration');

/**
 *  USER ROUTES
 */

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('/dashboard', [UserDashboard::class, 'index'])->name('user.dashboard');
    });

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
            Route::get('/activities', [ThriftActivityController::class, 'index'])->name('user.thrift.activities');
            Route::get('/slots', [ThriftSlotController::class, 'index'])->name('user.thrift.slots');
            Route::get('/user_slots', [ThriftSlotController::class, 'show'])->name('user.thrift.slots.show');
            Route::get('/user_slots/status', [ThriftSlotController::class, 'showStatus'])->name('user.thrift.slots.status');

            // Actions
            Route::post('/settings', [ThriftSettingsController::class, 'update'])->name('user.thrift.settings');
            Route::post('/slots', [ThriftSlotController::class, 'store'])->name('user.thrift.slots');
            Route::post('/user_slot/{id}', [ThriftSlotController::class, 'update'])->name('user.thrift.slot.update');
            Route::post('/user_slot/status/{thrift_slot}', [ThriftSlotController::class, 'statusUpdate'])->name('user.thrift.slot.status.update');
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
