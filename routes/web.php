<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    $users = User::all();
    return view('main', ['users' => $users]);
});

Route::post('/register', [UserController::class, 'createUser']);
Route::get('/edit-user/{user}', [UserController::class, 'showEdit']);
Route::put('/edit-user/{user}', [UserController::class, 'updateUser']);
Route::delete('/delete-user/{user}', [UserController::class, 'deleteUser']);
