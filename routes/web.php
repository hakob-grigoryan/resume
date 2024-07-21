<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/login', function () {
    return view('welcome');
});


Route::get('/', [UserController::class, 'index']);
Route::get('/register',[AdminController::class, 'register'])->name('register');
Route::post('/register/form',[AdminController::class, 'registerSubmit'])->name('registerSubmit');
Route::get('/login',[AdminController::class, 'login'])->name('login');
Route::post('/login/form',[AdminController::class, 'loginSubmit'])->name('loginSubmit');
Route::post('/create/notification',[UserController::class, 'store'])->name('notice_store');
Route::post('/update/status', [UserController::class, 'updateStatus'])->name('updateStatus');




Route::group(['prefix' => 'admins', 'as' => 'admin.'], function() {
    Route::get('/adminDashboard',[AdminController::class, 'index'])->name('adminDashboard');
    Route::get('/formDashboard',[AdminController::class, 'form'])->name('formDashboard');
    Route::get('/tableDashboard',[AdminController::class, 'table'])->name('tableDashboard');
    Route::get('/logout', [AdminController::class, 'logout' ])->name('logout');
    Route::post('/update-user', [AdminController::class, 'updateUser' ])->name('updateUser');
    Route::post('/create-post', [AdminController::class, 'createPost' ])->name('createPost');
    Route::delete('/delete-post', [AdminController::class, 'deletePost'])->name('deletePost');
    Route::post('/update-post', [AdminController::class, 'updatePost'])->name('updatePost');
    Route::post('/create-education', [AdminController::class, 'createEducation' ])->name('createEducation');
    Route::post('/update-education', [AdminController::class, 'updateEducation' ])->name('updateEducation');
    Route::delete('/delete-education', [AdminController::class, 'deleteEducation'])->name('deleteEducation');
    Route::post('/create-skill', [AdminController::class, 'createSkill' ])->name('createSkill');
    Route::post('/update-skill', [AdminController::class, 'updateSkill' ])->name('updateSkill');
    Route::delete('/delete-skill', [AdminController::class, 'deleteSkill'])->name('deleteSkill');
    Route::post('/create-info', [AdminController::class, 'createInfo' ])->name('createInfo');
    Route::post('/update-info', [AdminController::class, 'updateInfo' ])->name('updateInfo');
    Route::delete('/delete-info', [AdminController::class, 'deleteInfo'])->name('deleteInfo');
    Route::post('/create-news', [AdminController::class, 'createNews' ])->name('createNews');
    Route::post('/update-news', [AdminController::class, 'updateNews' ])->name('updateNews');
    Route::delete('/delete-news', [AdminController::class, 'deleteNews'])->name('deleteNews');
    Route::post('/create-img', [AdminController::class, 'createImg' ])->name('createImg');
    Route::post('/update-img', [AdminController::class, 'updateImg' ])->name('updateImg');
    Route::delete('/delete-img', [AdminController::class, 'deleteImg'])->name('deleteImg');
    Route::post('/create-settings', [AdminController::class, 'createSettings' ])->name('createSettings');
    Route::post('/update-settings', [AdminController::class, 'updateSettings' ])->name('updateSettings');
    Route::delete('/delete-settings', [AdminController::class, 'deleteSettings'])->name('deleteSettings');
});
