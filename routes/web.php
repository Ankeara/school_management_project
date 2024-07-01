<?php

use App\Http\Controllers\BatchesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EnrollmentsController;
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

Route::get('/', function () {
    return view('createproject');
});

Route::resource('/students', StudentController::class);
Route::resource('/teachers', TeacherController::class);
Route::resource('/courses', CoursesController::class);
Route::resource('/batches', BatchesController::class);
Route::resource('/enrollments', EnrollmentsController::class);
Route::resource('/payments', PaymentsController::class);

Route::get('batches/{id}/edit', 'BatchesController@edit')->name('batches.edit');
Route::put('batches/{id}', 'BatchesController@update')->name('batches.update');

Route::get('enrollments/{id}/edit', 'EnrollmentController@edit')->name('enrollments.edit');
Route::put('enrollments/{id}', 'EnrollmentController@update')->name('enrollments.update');

Route::get('payments/{id}/edit', 'PaymentController@edit')->name('payments.edit');
Route::put('payments/{id}', 'PaymentController@update')->name('payments.update');