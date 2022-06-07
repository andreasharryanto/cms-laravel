<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('index');
});
Route::get('/index', [HomeController::class, 'index'])->name('index');
Route::get('/profile/{userid}', [HomeController::class, 'profile'])->name('profile');
Route::post('/editProfile', [HomeController::class, 'editProfile'])->name('editProfile');
Route::get('/pageAdministration', [HomeController::class, 'pageAdministration'])->name('pageAdministration');
Route::get('/userAdministration', [HomeController::class, 'userAdministration'])->name('userAdministration');
Route::get('/pageManagement/{cid}', [HomeController::class, 'pageManagement'])->name('pageManagement');

Route::post('/searchUser', [UserController::class, 'searchUser'])->name('searchUser');
Route::post('/addUser', [UserController::class, 'addUser'])->name('addUser');
Route::get('/deleteUser/{userid}', [UserController::class, 'deleteUser'])->name('deleteUser');
Route::get('/editUser/{userid}', [UserController::class, 'editUser'])->name('editUser');
Route::post('/submitEditUser', [UserController::class, 'submitEditUser'])->name('submitEditUser');

Route::post('/searchContent', [ContentController::class, 'searchContent'])->name('searchContent');
Route::post('/addContent', [ContentController::class, 'addContent'])->name('addContent');
Route::get('/deleteContent/{cid}', [ContentController::class, 'deleteContent'])->name('deleteContent');
Route::get('/editContent/{cid}', [ContentController::class, 'editContent'])->name('editContent');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');