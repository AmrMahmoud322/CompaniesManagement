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

// Routes for authenticated admins
Route::group(['middleware'=>'auth'], function() {
    // Admin Home page 
    Route::get('/admin/index', [App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.index');

    // start company routes
        //  companies table
        Route::get('/admin/company/index', [App\Http\Controllers\Admin\CompanyController::class,'index'])->name('admin.company.index');
        // new company
        Route::get('/admin/company/new', [App\Http\Controllers\Admin\CompanyController::class,'new'])->name('admin.company.new');
        // new company form
        Route::post('/admin/company/new', [App\Http\Controllers\Admin\CompanyController::class,'add'])->name('admin.company.add');
        // show one company for editing
        Route::get('/admin/company/edit/{id}', [App\Http\Controllers\Admin\CompanyController::class,'show'])->name('admin.company.edit');
        // Edit company form
        Route::post('/admin/company/edit', [App\Http\Controllers\Admin\CompanyController::class,'edit'])->name('admin.company.update');
        // Delete company
        Route::post('/admin/company/delete/', [App\Http\Controllers\Admin\CompanyController::class,'delete'])->name('admin.company.delete');
    // end company routes

    // start employee routes
        // employee table
        Route::get('/admin/employee/index', [App\Http\Controllers\Admin\EmployeeController::class,'index'])->name('admin.employee.index');
        // new employee
        Route::get('/admin/employee/new', [App\Http\Controllers\Admin\EmployeeController::class,'new'])->name('admin.employee.new');
        // new employee form
        Route::post('/admin/employee/new', [App\Http\Controllers\Admin\EmployeeController::class,'add'])->name('admin.employee.add');
        // show one employee for editing
        Route::get('/admin/employee/edit/{id}', [App\Http\Controllers\Admin\EmployeeController::class,'show'])->name('admin.employee.edit');
        // Edit employee form
        Route::post('/admin/employee/edit', [App\Http\Controllers\Admin\EmployeeController::class,'edit'])->name('admin.employee.update');
        // Delete emplyee
        Route::post('/admin/employee/delete/', [App\Http\Controllers\Admin\EmployeeController::class,'delete'])->name('admin.employee.delete');
    // end emplyee routes
});
