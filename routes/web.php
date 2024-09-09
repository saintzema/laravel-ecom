<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome')
);

Route::get('/about', fn() => view('about'));

Route::get('/create/user/', [UserController::class, 'showCreateNewUserForm'])->name('show_create_user');
Route::post('/create/user', [UserController::class, 'storeUserData'])->name('store.user.data');

Route::get('/show/users', [UserController::class, 'showUsers'])->name('show_users');
Route::get('/show/{user}', [UserController::class,'deletedUser'])->name('deleted_user');
Route::get('/edit/{user}/', [UserController::class,'editUser'])->name('edit_user');
Route::put('/update/{user}', [UserController::class,'updateUser'])->name('update_user');
?>
