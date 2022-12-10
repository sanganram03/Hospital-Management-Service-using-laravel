<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', [HomeController::class,'index']);
Route::get('/home', [HomeController::class,'redirect'])->middleware('auth','verified');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view', [AdminController::class,'addview']);

Route::post('/upload_doctor', [AdminController::class,'upload']);

Route::post('/appointment', [HomeController::class,'appointment']);

Route::get('/myappointment', [HomeController::class,'myappointment']);

Route::get('/cancelappoint/{id}', [HomeController::class,'cancelappoint']);

Route::get('/showappointment', [AdminController::class,'showappointment']);

Route::get('/approved/{id}', [AdminController::class,'approved']);

Route::get('/reject/{id}', [AdminController::class,'reject']);

Route::get('/viewdoctor', [AdminController::class,'viewdoctor']);

Route::get('/deletedoctor/{id}', [AdminController::class,'deletedoctor']);

Route::get('/editdoctor/{id}', [AdminController::class,'editdoctor']);

Route::post('/updatedoctor/{id}', [AdminController::class,'updatedoctor']);

Route::get('/appointmentconfirm/{id}', [AdminController::class,'appointmentconfirm']);

Route::post('/sendemail/{id}', [AdminController::class,'sendemail']);

Route::get('/crenews', [AdminController::class,'crenews']);

Route::match(array('GET', 'POST'),'/upload_news', [AdminController::class,'uploadnews']);

//Route::post('/upload_news', [AdminController::class,'uploadnews'])->dimage('get.show');
