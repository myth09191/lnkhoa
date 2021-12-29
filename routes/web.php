<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ChapterTranhController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TruyenTranhController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleDrive;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('/', [IndexController::class, 'home']);
Route::get('/dash-board', [IndexController::class, 'dashboard']);
Route::get('/yeu-thich', [IndexController::class, 'yeuthich']);
Route::get('/xem-nhieu', [IndexController::class, 'xemnhieu']);
Route::get('/de-cu', [IndexController::class, 'decu']);
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc']);
Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemtruyen']);
Route::get('/xem-chapter/{slug}', [IndexController::class, 'xemchapter']);
Route::get('/the-loai/{slug}', [IndexController::class, 'theloai']);
Route::post('/timkiem-ajax', [IndexController::class, 'timkiemajax']);
Route::get('/tag/{tag}', [IndexController::class, 'tag']);
Route::post('/truyennoibat', [TruyenController::class, 'truyennoibat']);

Auth::routes();

Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('/impersonate/user/{id}', [UserController::class, 'impersonate']);
Route::get('/user/stopImpersonate', [UserController::class, 'stopImpersonate']);
Route::get('/tim-kiem', [IndexController::class, 'timkiem']);

Route::get('/home', [HomeController::class, 'index'])->name('home');






	Route::resource('/user', UserController::class);	
	Route::resource('/danhmuc', DanhmucController::class);
	Route::resource('/truyen', TruyenController::class);
	Route::resource('/sach', SachController::class);
	Route::resource('/chapter', ChapterController::class);
	Route::resource('/theloai', TheloaiController::class);
	Route::resource('/information', InformationController::class);
	Route::get('/home', [UserController::class, 'index'])->name('home');
	Route::get('/impersonate/user/{id}', [UserController::class,'impersonate']);
	Route::get('/user/stopImpersonate', [UserController::class,'stopImpersonate']);


Route::resource('/user',UserController::class);



	Route::get('/phan-vaitro/{id}', [UserController::class,'phanvaitro']);
	Route::get('/phan-quyen/{id}', [UserController::class,'phanquyen']);
	Route::get('/assignRole/{id}', [UserController::class, 'assignRole']);
	Route::post('/insert_roles/{id}', [UserController::class, 'insert_roles']);
	Route::post('/insert_permission/{id}', [UserController::class, 'insert_permission']);
	Route::post('/insert_permission', [UserController::class, 'insert_per_permission']);
	Route::post('/insert_roles', [UserController::class, 'insert_r_role']);
	Route::resource('/danhmuc', DanhmucController::class);
	Route::get('/danhmuc/create',[DanhmucController::class, 'create'])->name('danhmuc.create');



