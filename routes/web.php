<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
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
    return Inertia::render('Welcome');
}); //->middleware('role:test');

# error pages
Route::get('/error-503', function () {
    return Inertia::render('Error/503');
})->name('error-503');


# employees
use App\Http\Controllers\SysEmployeeController;

Route::get('/employees', [SysEmployeeController::class, 'index'])->name('employees');
Route::post('/employees', [SysEmployeeController::class, 'create'])->name('employee.create');
Route::get('/settings/departments', function () {
    return Inertia::render('Admin/Departments');
})->middleware(['auth', 'verified']);

Route::get('/settings/Users', function () {
    return Inertia::render('Admin/ManageAccounts');
})->middleware(['auth', 'verified']);

Route::get('/settings/SupportFunction', function () {
    return Inertia::render('Admin/SupportFunction');
})->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';
require __DIR__ . '/prating.php';
require __DIR__ . '/pms.php';
