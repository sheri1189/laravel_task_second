<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\NicheController;
use App\Http\Controllers\NishmentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Models\Design_Images;
use App\Models\Nishment;
use App\Models\Role;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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
// ------------------Pages Controller Here----------------------
Route::get('/clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('event:clear');
    echo 'Cache Cleared';
});
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'signin')->name('authentication.signin');
    Route::get('/forget', 'forget')->name('authenticaion.forget');
});
Route::controller(AuthenticationController::class)->group(function () {
    Route::post('/signin', 'signin')->name('authentication.login');
    Route::post('/reset-link', 'resetLink')->name('authentication.resetLink');
    Route::get('/reset-password/{email}', 'resetPassword')->name('authenticaion.reset');
    Route::post('/update_password', 'updatePassword')->name('authenticaion.update');
});
Route::group(["middleware" => ["authsecurity"]], function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard.dashboard');
        Route::get('/profile', 'profile')->name('dashboard.profile');
    });
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/logout', 'logout')->name('authenticaion.logout');
        Route::put('/user_update/{id}', 'updateProfile');
    });
    Route::resources([
        '/company' => CompanyController::class,
        '/employee' => EmployeeController::class,
    ]);
    Route::controller(CompanyController::class)->group(function () {
        Route::get('/add_company', 'add_company');
    });
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/add_employee', 'add_employee');
    });
});
