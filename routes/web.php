<?php

use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\FeeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Artisan;
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



require __DIR__.'/auth.php';

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    return "Cleared!";
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::group(['middleware'=>['auth']],function (){
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/students', StudentController::class);
    Route::resource('/fee', FeeController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/purchase', PurchaseController::class);
    Route::resource('/exam', ExamController::class);
});