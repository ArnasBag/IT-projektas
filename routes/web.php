<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultationsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PurchasesController;


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
Route::get('/consultation/{id}', [MessagesController::class, 'index'])->name('consultation');

Route::get('pirkimas', function(){
    return view('pirkimas');
})->name('pirkimas');

Route::get('duk', function(){
    return view('duk');
})->name('duk');

Route::get('demo', function(){
    return view('demo');
})->name('demo');

Route::get('admin', [AdminController::class, 'index'])->name('admin')->middleware('role:admin');
Route::post('admin/update', [AdminController::class, 'store']);
Route::get('consultant', [ConsultationsController::class, 'index'])->name('consultant')->middleware('role:consultant');
Route::get('fill_dates/{id}', [ReservationsController::class, 'fill_dates']);
Route::post('reservation/create', [ReservationsController::class, 'store']);
Route::get('konsultacijos_kurimas', [ConsultationsController::class, 'create'])->name('konsultacijos_kurimas')->middleware('role:consultant');
Route::post('konsultacijos_kurimas', [ConsultationsController::class, 'store']);

Route::get('quick-help/{id}', [ConsultationsController::class, 'quick_help'])->name('quick-help');
Route::post('credits/purchase', [PurchasesController::class, 'store']);
Route::post('end-consultation', [ConsultationsController::class, 'end_consultation']);
Route::post('send', [MessagesController::class, 'sendMessage']);
Route::get('main-test', [MessagesController::class, 'test']);
Route::post('end-help', [ConsultationsController::class, 'endHelp']);
Route::get('check-help/{id}', [ConsultationsController::class, 'checkIfEnded']);

Route::middleware('client')->group(function(){
    Route::get('/main', [ReservationsController::class, 'index'])->name('main');
    Route::get('rezervacijos_kurimas', [ReservationsController::class, 'create'])->name('rezervacijos_kurimas');
});
