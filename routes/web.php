<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminCategoryController;

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

Route::get('/', [PostController::class, 'index'])->middleware('auth');
Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::get('/posts/{post:kode}', [PostController::class, 'show']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');;
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'title' => 'Dashboard User'
    ]);
})->middleware('admin');

Route::resource('/dashboard/posts',  AdminPostsController::class)->middleware('admin');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/users', AdminUserController::class)->except('show');
Route::get('/dashboard/users/{user}/password', [PasswordController::class, 'index'])->name('users.edit.password')->middleware('auth');
Route::post('/dashboard/users/{user}', [PasswordController::class, 'change_password'])->name('users.update.password')->middleware('auth');

Route::get('categories', function(){
    return view('categories', [
        'title' => 'Halaman Categories',
        'categories' => Category::all()
        
    ]);

})->middleware('auth');

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Muhammad Rafka",
        "email" => "Muhammad_rafka@gmail.com",
        "image" => "rafka.jpg"
    ]);
})->middleware('auth');
