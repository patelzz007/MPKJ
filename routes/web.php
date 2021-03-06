<?php

//Admin
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\BahagianController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MasaTemuJanjiController;
use App\Http\Controllers\Admin\PerkhidmatanController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SystemCalendarController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;

//User
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserAppointmentController;
use App\Http\Controllers\User\UserSystemCalendarController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    Route::group(['prefix' => 'configuration', 'as' => 'configuration.',], function () {

        // Bahagian
        Route::resource('bahagians', BahagianController::class, ['except' => ['store', 'update', 'destroy']]);

        // Masa Temu Janji
        Route::resource('masa-temu-janjis', MasaTemuJanjiController::class, ['except' => ['store', 'update', 'destroy']]);

        // Perkhidmatan
        Route::resource('perkhidmatans', PerkhidmatanController::class, ['except' => ['store', 'update', 'destroy']]);
    });

    // Appointment
    Route::resource('appointments', AppointmentController::class, ['except' => ['store', 'update', 'destroy']]);

    // System Calendar
    Route::resource('system-calendars', SystemCalendarController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

   });


   Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});


Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth']], function () {
    // Dashboard
    Route::get('/', [UserHomeController::class, 'index'])->name('home');

    // Appointment
    Route::resource('appointments', UserAppointmentController::class, ['except' => ['store', 'update', 'destroy']]);
    
    // System Calendar
    Route::resource('system-calendars', UserSystemCalendarController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);
});
