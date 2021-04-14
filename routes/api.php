<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\RegistrationDashboard\RegistrationDashboardController;
use App\Http\Controllers\Auth\FacultyCodeController;
use App\Http\Controllers\RegistrationDashboard\GenderController;
use App\Http\Controllers\AdminPage\AccountingPage\StudentListController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', LoginController::class);
Route::post('/signup', SignUpController::class);

Route::post('/forgot-password', ForgotPasswordController::class);

Route::post('/reset-password', ResetPasswordController::class);

Route::group(['middleware' => 'auth:api'], function(){

    Route::group(['middleware' => ['role:admin']], function () {
        Route::post('/accounting/student-list', StudentListController::class)->name('studentsList');
    });
    Route::post('/dashboard', RegistrationDashboardController::class)->name('dashboard');

    Route::post('/getGenderTitle', GenderController::class)->name('getGenderTitle');
    Route::post('/getFacultyTitle', FacultyCodeController::class)->name('getFacultyTitle');
    Route::post('/getProgramTitle', [FacultyCodeController::class, 'getProgramCode'])->name('getProgramTitle');
});
