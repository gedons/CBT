<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ModeController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\DeptController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\QuestionController;

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
		Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
		Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('mode', [AdminController::class, 'mode'])->name('admin.mode');
        Route::get('level', [AdminController::class, 'level'])->name('admin.level');
        Route::get('course', [AdminController::class, 'course'])->name('admin.course');
        Route::get('department', [AdminController::class, 'department'])->name('admin.department');
        Route::get('cbt', [AdminController::class, 'cbt'])->name('admin.cbt');
        Route::get('profiles', [AdminController::class, 'profiles'])->name('admin.profiles');


        //Mode of Study
        Route::get('mode/add', [ModeController::class, 'add'])->name('mode.add');
        Route::post('mode/save', [ModeController::class, 'save'])->name('mode.save');

        //level
        Route::get('level/add', [LevelController::class, 'add'])->name('level.add');
        Route::post('level/save', [LevelController::class, 'save'])->name('level.save');

        //department
        Route::get('department/add', [DeptController::class, 'add'])->name('department.add');
        Route::post('department/save', [DeptController::class, 'save'])->name('department.save');

        //course
        Route::get('course/add', [CourseController::class, 'add'])->name('course.add');
        Route::post('course/save', [CourseController::class, 'save'])->name('course.save');

        //exam
        Route::get('cbt/add', [ExamController::class, 'add'])->name('cbt.add');
        Route::post('cbt/save', [ExamController::class, 'save'])->name('cbt.save');

        //question
        Route::get('cbt/question/add', [QuestionController::class, 'add'])->name('question.add');

	});

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
