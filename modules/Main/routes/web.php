<?php

use Modules\Main\Http\Controllers\{
    CategoryController,
    MainController,
    TaskController
};

Route::group(['as' => 'main.', 'middleware' => ['web']], function() {
    Route::get('', [MainController::class,'index'])->name('index');

    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
});
