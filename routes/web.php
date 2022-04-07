<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DefectiveController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\FormborrowController;

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
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {



// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    // Dashboard
    Route::get('/dashboard', [StockController::class, 'dashboard'])->name('dashboard');

    // Users
    Route::get('/user/all', [UserController::class, 'index'])->name('user');

    // Search
    Route::get('/search', [SearchController::class, 'search'])->name('searchWeb');

    // Report
    Route::get('/report', [ReportController::class, 'report'])->name('report');

    // Department
    Route::get('/department/all', [DepartmentController::class, 'index'])->name('department');
    Route::post('/department/add', [DepartmentController::class, 'store'])->name('addDepartment');
    Route::get('/department/edit/{id}', [DepartmentController::class, 'edit']);
    Route::post('/department/update/{id}', [DepartmentController::class, 'update']);

    // SoftDelete
    Route::get('/department/softdelete/{id}', [DepartmentController::class, 'softdelete']);
    Route::get('/department/restore/{id}', [DepartmentController::class, 'restore']);
    Route::get('/department/delete/{id}', [DepartmentController::class, 'delete']);

    // Service
    Route::get('/service/all', [ServiceController::class, 'index'])->name('service');
    Route::post('/service/add', [ServiceController::class, 'store'])->name('addService');

    Route::get('/service/edit/{id}', [ServiceController::class, 'edit']);
    Route::post('/service/update/{id}', [ServiceController::class, 'update']);
    Route::get('/service/delete/{id}', [ServiceController::class, 'delete']);

    // Type
    Route::get('/type', [TypeController::class, 'index'])->name('type');
    Route::post('/type/add', [TypeController::class, 'store'])->name('addType');

    Route::get('/type/edit/{id}', [TypeController::class, 'edit']);
    Route::post('/type/update/{id}', [TypeController::class, 'update']);
    Route::get('/type/delete/{id}', [TypeController::class, 'delete']);

    // Categories
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category/add', [CategoryController::class, 'store'])->name('addCategory');

    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/category/update/{id}', [CategoryController::class, 'update']);
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete']);

    // Stock
    Route::get('/stock/all', [StockController::class, 'index'])->name('stock');
    Route::post('/stock/add', [StockController::class, 'store'])->name('addStock');

    Route::get('/stock/add_stock/', [StockController::class, 'add']);
    Route::get('/stock/edit/{id}', [StockController::class, 'edit']);
    Route::post('/stock/update/{id}', [StockController::class, 'update']);
    Route::get('/stock/delete/{id}', [StockController::class, 'delete']);
    Route::post('/stock/defective/{id}', [StockController::class, 'defective']);

    // Device
    Route::get('/device', [DeviceController::class, 'index'])->name('device');
    Route::post('/device/add', [DeviceController::class, 'store'])->name('addDevice');

    Route::get('/device/add_device/', [DeviceController::class, 'add']);
    Route::get('/device/edit/{id}', [DeviceController::class, 'edit']);
    Route::post('/device/update/{id}', [DeviceController::class, 'update']);
    Route::get('/device/delete/{id}', [DeviceController::class, 'delete']);

    // Defective
    Route::get('/defective', [DefectiveController::class, 'index'])->name('defective');
    Route::post('/defective/add', [DefectiveController::class, 'store'])->name('addDefective');

    Route::get('/defective/add_defective/', [DefectiveController::class, 'add']);
    Route::get('/defective/edit/{id}', [DefectiveController::class, 'edit']);
    Route::post('/defective/update/{id}', [DefectiveController::class, 'update']);

    //form borrow
    Route::get('/formuser', [FormborrowController::class, 'index'])->name('user');

});