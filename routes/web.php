<?php

use Illuminate\Support\Facades\Route;
use App\Models\Todo;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ImageController;

Route::prefix('lists')->group(function(){
    Route::get('/', [TodoController::class, 'lists'])->name('lists');
    Route::post('/', [TodoController::class, 'insertTask']);
    Route::delete('/{id}' ,[TodoController::class, 'delete']); 
    Route::get('/{id}', [TodoController::class, 'updatePage']);
    Route::put('/{id}', [TodoController::class, 'updating']);
});
    
Route::get('images/{id}', [ImageController::class, 'imagesPage']);
Route::controller(ImageController::class)->group(function(){
    Route::post('/upload-image', 'storeImage')->name('image.store');
});
