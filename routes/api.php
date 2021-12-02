<?php

use App\Http\Controllers\Helpers\ImportExportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\RegistrationDashboard\RegistrationDashboardController;
use App\Http\Controllers\Auth\FacultyCodeController;
use App\Http\Controllers\RegistrationDashboard\GenderController;
use App\Http\Controllers\AdminPage\StudentListController;
use App\Http\Controllers\Helpers\RoleController;
use App\Http\Controllers\AdminPage\DirectorPage\StudentAssistantController;
use App\Http\Controllers\AdminPage\RoomController;
use App\Http\Controllers\AdminPage\DirectorPage\ConnectStudentController;
use App\Http\Controllers\AdminPage\DirectorPage\FloorAssistantController;
use App\Http\Controllers\AdminPage\AdminSideBarController;
use App\Http\Controllers\RegistrationDashboard\FreePlaceController;
use App\Http\Controllers\Helpers\FileToBase64Controller;
use App\Http\Controllers\AdminPage\DirectorPage\AcceptStudentController;
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

Route::post('/dashboard', RegistrationDashboardController::class)->name('dashboard');

Route::post('/getGenderTitle', GenderController::class)->name('getGenderTitle');
Route::post('/getFacultyTitle', FacultyCodeController::class)->name('getFacultyTitle');
Route::post('/getProgramTitle', [FacultyCodeController::class, 'getProgramCode'])->name('getProgramTitle');
Route::post('/getFreePlaceCount', FreePlaceController::class)->name('getFreePlaceCount');

Route::group(['middleware' => 'auth:api'], function(){

//    Route::group(['middleware' => ['role:admin']], function () {
        Route::post('/admin/side-bar', AdminSideBarController::class)->name('AdminSideBar');
        Route::post('/director/student-list', [StudentListController::class, 'directorList'])->name('studentsList');
        Route::post('/director/student-assistant', StudentAssistantController::class)->name('assistantList');
        Route::put('/director/student-assistant/update-room', [StudentAssistantController::class, 'updateRoom'])->name('updateRoom');
        Route::post('/director/create-assistant', [StudentAssistantController::class, 'create'])->name('createAssistant');
        Route::put('/director/update-assistant', [StudentAssistantController::class, 'update'])->name('updateAssistant');
        Route::post('/director/assistant-room', [RoomController::class, 'assistantRoom'])->name('assistantRooms');
        Route::post('/director/related-student', [StudentAssistantController::class, 'relatedStudents'])->name('relatedStudents');
        Route::post('/director/connect-student', ConnectStudentController::class)->name('connectStudent');
        Route::post('/director/floor-assistant', FloorAssistantController::class)->name('floorAssistantList');
        Route::post('/director/floor-create', [FloorAssistantController::class, 'create'])->name('floorAssistantCreate');
        Route::post('/director/related-assistant', [FloorAssistantController::class, 'relatedAssistants'])->name('relatedAssistant');
        Route::post('/director/floor-assistant-room', [RoomController::class, 'floorAssistantRoom'])->name('floorAssistantRooms');
        Route::post('/director/bookingStudents', [StudentListController::class, 'bookingStudentList'])->name('bookingStudents');
        Route::post('/director/acceptStudent', AcceptStudentController::class)->name('acceptStudent');
        Route::get('/director/exportStudentList', [ImportExportController::class, 'export'])->name('export');
//    });

    Route::post('/getUserRole', RoleController::class)->name('getUserRole');
});

Route::post('/fileToBase64', FileToBase64Controller::class)->name('fileToBase64');
