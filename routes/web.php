<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;

//Index
Route::view('/', fn() => view('welcome')

);

Route::controller(JobController::class)->group(function() {

Route::get('/jobs/create', 'create')->name('jobs.create');
Route::get('/jobs/{id}', 'show')->name('jobs.show');
Route::post('/jobs', 'store')->name('jobs.store');
Route::get('/jobs/{id}/edit', 'edit')->name('edit');
Route::patch('/jobs/{id}', 'update')->name('update');
Route::delete('/jobs/{job}', 'destroy');
});

Route::get('/jobs', [JobController::class, 'index']);

Route::get('/register', [RegisteredUserController::class, 'create']);



Route::get('/contact', [UserController::class, "contact"])->name('contact');

Route::get('/create/user/', [UserController::class, 'showCreateNewUserForm'])->name('show_create_user');
Route::post('/create/user', [UserController::class, 'storeUserData'])->name('store.user.data');
Route::get('/show/users', [UserController::class, 'showUsers'])->name('show_users');
Route::get('/show/{user}', [UserController::class,'deletedUser'])->name('deleted_user');
Route::get('/edit/{user}/', [UserController::class,'editUser'])->name('edit_user');
Route::put('/update/{user}', [UserController::class,'updateUser'])->name('update_user');
?>
