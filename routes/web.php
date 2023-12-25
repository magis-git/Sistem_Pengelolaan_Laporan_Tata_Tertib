<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentReportController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\SuratPeringatanController;
use App\Http\Controllers\EditStudentController;
use App\Http\Controllers\ImportController;


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



Route::group(['middleware' => 'revalidate'], function () {
    Route::get('/', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('loginform');
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
    Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['auth', 'user-access:admin']], function () {
        Route::get('/admin', [App\Http\Controllers\Users\AdminController::class, 'index'])->name('admin.dashboard');
    });

    Route::group(['middleware' => ['auth', 'user-access:bk']], function () {
        Route::get('/BK', [App\Http\Controllers\Users\BKController::class, 'index'])->name('bk.dashboard');
    });

    Route::group(['middleware' => ['auth', 'user-access:tu']], function () {
        Route::get('/TU', [App\Http\Controllers\Users\TUController::class, 'index'])->name('tu.dashboard');
    });

    Route::group(['middleware' => ['auth', 'user-access:wali']], function () {
        Route::get('/wali', [App\Http\Controllers\Users\WaliController::class, 'index'])->name('wali.dashboard');
    });

    Route::group(['middleware' => ['auth', 'user-access:guru']], function () {
        Route::get('/Guru', [App\Http\Controllers\Users\GuruController::class, 'index'])->name('guru.dashboard');
    });
});

Route::resource("users", UserController::class);

Route::resource('reports', StudentReportController::class);

Route::resource('kelas', KelasController::class);

Route::resource('violation', ViolationController::class);

Route::resource('verification', VerificationController::class);

Route::resource('suratPeringatan', SuratPeringatanController::class);

Route::resource('editStudent', EditStudentController::class);

Route::get('/admin/dashboard','App\Http\Controllers\StudentReportController@adminIndex')->name('reports.admin-index');

Route::get('/wali/dashboard/reports','App\Http\Controllers\StudentReportController@waliIndex')->name('reports.wali-index');

Route::get('/wali/dashboard/suratPeringatan','App\Http\Controllers\SuratPeringatanController@waliIndex')->name('suratPeringatan.wali-index');

// Route::post('/reports/reset', [StudentReportController::class, 'reset'])->name('reports.reset');
Route::post('/reports/admin-index', 'App\Http\Controllers\StudentReportController@reset')->name('reports.reset');

Route::get('/export', 'App\Http\Controllers\ExportController@export')->name('export');
Route::get('/export2/{id}', 'App\Http\Controllers\ExportController@export2')->name('export2');

Route::get('/import', [ImportController::class, 'showForm']);
Route::post('/import', [ImportController::class, 'import']);

// Route::get('/reports/exportPdf', 'App\Http\Controllers\ExportController@exportPdf')->name('reports.exportPdf');

// Route::post('/reports/admin-index', 'App\Http\Controllers\ViolationController@reset')->name('violation.reset');


