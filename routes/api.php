<?php

use App\Http\Controllers\UsersController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProfileController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

// Protected routes
//Route::middleware('auth:sanctum')->group(function () {
//    Route::get('/user', function (Request $request) {
//        return $request->user();
//    });
//});
//
//
//Route::post('/register', [AuthController::class, 'register']);
//Route::post('/login', [AuthController::class, 'login']);
//
//Route::middleware('auth:sanctum')->group(function () {
//    Route::get('/user', [AuthController::class, 'user']);
//    Route::post('/logout', [AuthController::class, 'logout']);
//});

//Route::get('/', function () {
//    return view('home', [
//        'users' => User::all(),
//    ]);
//})->name('home');

//Route::get('/dashboard', function () {
//    return view('dashboard', [
//        'user' => User::all(),
//    ]);
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware('role:admin')
        ->resource('users', UsersController::class)->except(['show', 'create', 'store']);

});

Route::get('/customers', [UsersController::class, 'index'])->name('users.index');
Route::get('/users', [UsersController::class, 'index'])->name('users.index');


require __DIR__ . '/auth.php';
