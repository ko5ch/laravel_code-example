<?php

use Illuminate\Support\Facades\Auth;
use Modules\Users\Http\Controllers\Auth\{
    ForgotPasswordController,
    ResetPasswordController,
    RegisterController,
    LoginController
};
use Modules\Users\Http\Controllers\{
    UserTaskController,
    UsersController
};

Route::group(['middleware' => 'web'], function () {

    Route::group([], function() {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register']);

        Route::group(['prefix' => 'password', 'as' => 'password.'], function() {
            Route::get('reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
            Route::post('email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('email');
            Route::get('reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset');
            Route::post('reset', [ResetPasswordController::class, 'reset']);
        });
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::bind('uid',function ($id) {
            return \App\Services\Hash\Hasher::decode($id);
        });
        Route::resource('tasks', UserTaskController::class)->only('index', 'create', 'store');
        Route::get('tasks/{uid}', [UserTaskController::class, 'edit'])->name('tasks.edit');
        Route::put('tasks/{uid}', [UserTaskController::class, 'update'])->name('tasks.update');
        Route::post('tasks/{uid}/status', [UserTaskController::class, 'updateStatus'])->name('tasks.updateStatus');
//        foreach (['done', 'undone'] as $status) {
//            Route::get('tasks/{uid}/'.$status, [UserTaskController::class, 'updateStatus'.ucfirst($status)])
//                ->name('tasks.update_status_'.$status);
//        }
        Route::delete('tasks/{uid}', [UserTaskController::class, 'destroy'])->name('tasks.destroy');
    });
});
