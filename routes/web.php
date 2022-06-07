<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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
    return view('welcome');
});

//admin routes
Route::prefix('/admin')->namespace('Admin')->group(function (){
    //login
    Route::get('/', [AdminController::class, 'login']);
    Route::post('login', [AdminController::class, 'loginAdmin'])->name('admin.login');

    //middleware group route that guards the admin
    Route::group(['middleware'=>['admin']],function ()
	{
		Route::get('dashboard', [AdminController::class, 'dashboard']);
		Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
	});

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
