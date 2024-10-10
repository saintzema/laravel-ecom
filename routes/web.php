<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

//Index
Route::get('/', fn() => view('welcome'));

Route::resource('jobs', JobController::class)->middleware('auth');

Route::middleware(['auth'])->group(function() {

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');


Route::patch('/jobs/{id}', [JobController::class, 'update'])->name('update');
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
});

Route::get('/jobs', [JobController::class, 'index']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register',[RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::post('logout', [SessionController::class, 'destroy']);



Route::get('/contact', [UserController::class, "contact"])->name('contact');

Route::get('/create/user/', [UserController::class, 'showCreateNewUserForm'])->name('show_create_user');
Route::post('/create/user', [UserController::class, 'storeUserData'])->name('store.user.data');
Route::get('/show/users', [UserController::class, 'showUsers'])->name('show_users');
Route::get('/show/{user}', [UserController::class,'deletedUser'])->name('deleted_user');
Route::get('/edit/{user}/', [UserController::class,'editUser'])->name('edit_user');
Route::put('/update/{user}', [UserController::class,'updateUser'])->name('update_user');
?>
