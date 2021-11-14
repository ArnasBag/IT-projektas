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
Route::get('main', function(){
    return view('main');
});
Route::get('konsultacija', function(){
    return view('konsultacija');
})->name('konsultacija');

Route::get('pirkimas', function(){
    return view('pirkimas');
})->name('pirkimas');

Route::get('duk', function(){
    return view('duk');
})->name('duk');

Route::get('demo', function(){
    return view('demo');
})->name('demo');

Route::get('admin', function(){
    return view('admin');
})->name('admin')->middleware('role:admin');

Route::get('consultant', function(){
    return view('consultant');
})->name('consultant')->middleware('role:consultant');

Route::get('rezervacijos_kurimas', function(){
    return view('rezervacijos_kurimas');
})->name('rezervacijos_kurimas');

Route::get('konsultacijos_kurimas', function(){
    return view('konsultacijos_kurimas');
})->name('konsultacijos_kurimas')->middleware('role:consultant');
