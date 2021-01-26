<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/admin/index', [App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.index');

    Route::get('/admin/company/index', [App\Http\Controllers\Admin\CompanyController::class,'index'])->name('admin.company.index');
    Route::get('/admin/company/new', [App\Http\Controllers\Admin\CompanyController::class,'new'])->name('admin.company.new');
    Route::post('/admin/company/new', [App\Http\Controllers\Admin\CompanyController::class,'add'])->name('admin.company.add');
    Route::get('/admin/company/edit/{id}', [App\Http\Controllers\Admin\CompanyController::class,'show'])->name('admin.company.edit');
    Route::post('/admin/company/edit', [App\Http\Controllers\Admin\CompanyController::class,'edit'])->name('admin.company.update');
    Route::post('/admin/company/delete/', [App\Http\Controllers\Admin\CompanyController::class,'delete'])->name('admin.company.delete');

    Route::get('/admin/employee/index', [App\Http\Controllers\Admin\EmployeeController::class,'index'])->name('admin.employee.index');
    Route::get('/admin/employee/new', [App\Http\Controllers\Admin\EmployeeController::class,'new'])->name('admin.employee.new');
    Route::post('/admin/employee/new', [App\Http\Controllers\Admin\EmployeeController::class,'add'])->name('admin.employee.add');
    Route::get('/admin/employee/edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class,'show'])->name('admin.employee.edit');
    Route::post('/admin/employee/edit', [App\Http\Controllers\Admin\EmployeeController::class,'edit'])->name('admin.employee.update');
    Route::post('/admin/employee/delete/', [App\Http\Controllers\Admin\EmployeeController::class,'delete'])->name('admin.employee.delete');

});
