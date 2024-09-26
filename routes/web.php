<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome')

);




Route::get('/jobs', [JobController::class, 'index']);

Route::get('/jobs/create', function(){
return view('create');
});

    Route::get('/jobs/{id}', function($id) {

            $job = Arr::first(Job::all(), fn($job)=>$job['id'] == $id);

                return view('jobs.show', ['job' => $job]);
    });

Route::get('/contact', [UserController::class, "contact"])->name('contact');

Route::get('/create/user/', [UserController::class, 'showCreateNewUserForm'])->name('show_create_user');
Route::post('/create/user', [UserController::class, 'storeUserData'])->name('store.user.data');
Route::get('/show/users', [UserController::class, 'showUsers'])->name('show_users');
Route::get('/show/{user}', [UserController::class,'deletedUser'])->name('deleted_user');
Route::get('/edit/{user}/', [UserController::class,'editUser'])->name('edit_user');
Route::put('/update/{user}', [UserController::class,'updateUser'])->name('update_user');
?>
