<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('blog', function () {
    return view('blog');
})->name('blog');

Route::get('class', function () {
    return view('class');
})->name('class');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('index', function () {
    return view('index');
})->name('index');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('single', function () {
    return view('single');
})->name('single');

Route::get('team', function () {
    return view('team');
})->name('team');

Route::get('/', function () {
    return view('welcome');
});

