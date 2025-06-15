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

use App\Http\Controllers\InquiryController;

Route::get('/', function () {
    return 'Laravel app は動作しています';
});

Route::get('/contact', function () {
    return view('form');
    // return view('form2');
});

Route::post('/contact', [InquiryController::class, 'submit'])->name('inquiry.submit');

?>