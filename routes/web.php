<?php

use App\Http\Controllers\AuthController;
use App\Livewire\AdminPannel;
use App\Livewire\BlogPannel;
use App\Livewire\CreateBlog;
use App\Livewire\CreateBlogTest;
use App\Livewire\HomeBlog;
use App\Livewire\Index;
use App\Livewire\MyBlog;
use App\Livewire\PostBlog;
use App\Livewire\Profile;
use App\Livewire\ProfileMultiUser;
use App\Livewire\Test;
use App\Livewire\Testbutton;
use App\Livewire\UserPanel;
use App\Livewire\ViewBlog;
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

Route::get('/login-blog', [AuthController::class, 'login_view']);
Route::post('/login-blog/action', [AuthController::class, 'login']);
Route::get('/registrasi-blog', [AuthController::class, 'registrasi_view']);
Route::post('/registrasi-blog/action', [AuthController::class, 'registrasi']);

Route::middleware('auth')->group(function () {
    Route::get('/my-blog', MyBlog::class);
    Route::get('/view-blog', ViewBlog::class);
    Route::get('/create-blog', CreateBlog::class);
    Route::get('/post', PostBlog::class);
    Route::get('/', HomeBlog::class);
    Route::get('/profile', Profile::class);
    Route::get('/profile-multi-user', ProfileMultiUser::class);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/admin-panel', AdminPannel::class);
    Route::get('/user-panel', UserPanel::class);
    Route::get('/blog-panel', BlogPannel::class);
    Route::middleware(['role:admin'])->group(function() {
    });
});
Route::get('/login_gagal', function () {
    return view('auth.login_gagal');
})->name('login_gagal');
