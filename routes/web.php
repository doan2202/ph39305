<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckTokenMiddleware;
use Illuminate\Support\Facades\DB;
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




//middleware yeu cau dang nhap
Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/genre/list', [AdminController::class, 'gindex'])->name('g.index');
    Route::get('/admin/genre/list', [AdminController::class, 'gindex'])->name('g.index');
    Route::get('/admin/genre/create', [AdminController::class, 'gcreate'])->name('g.create');
    Route::post('/admin/genre/create', [AdminController::class, 'gstore'])->name('g.store');
    Route::get('/admin/genre/edit/{genre}', [AdminController::class, 'gedit'])->name('g.edit');
    Route::put('/admin/genre/edit/{genre}', [AdminController::class, 'gupdate'])->name('g.update');
    Route::delete('/admin/delete/genre/{genre}', [AdminController::class, 'gdestroy'])->name('g.destroy');

    Route::get('/admin/movie/list/{genre}', [AdminController::class, 'mindex'])->name('admin.mindex');
    Route::get('/admin/movie/list', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/movie/detail/{movie}', [AdminController::class, 'detail'])->name('admin.detail');
    Route::get('/admin/movie/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/movie/create', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/movie/edit/{movie}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/movie/edit/{movie}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{movie}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/movie/search', [AdminController::class, 'search'])->name('admin.search');
    // hiển thị bài viết theo danh mục
    Route::get('admin/user/list', [LoginController::class, 'list'])->name('user.list');
    Route::get('/admin/{id}/activate', [LoginController::class, 'activate'])->name('admin.activate');
    Route::get('/admin/{id}/deactivate', [LoginController::class, 'deactivate'])->name('admin.deactivate');

    Route::get('/admin/edit/user/{user}', [LoginController::class, 'edit'])->name('user.edit');
    Route::put('/admin/update/user/{user}', [LoginController::class, 'update'])->name('user.update');
    Route::get('/admin/detail/user/{user}', [LoginController::class, 'detail'])->name('user.detail');
    Route::get('/admin/user/changePass', [LoginController::class, 'change'])->name('change');
    Route::post('/admin/user/changePass', [LoginController::class, 'changePass'])->name('changePass');
    Route::delete('/admin/user/delete/{user}', [LoginController::class, 'destroy'])->name('user.destroy');
});


Route::get('/',function(){
    return view('Home');
})->name('home');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postlogin'])->name('postLogin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('postRegister');
