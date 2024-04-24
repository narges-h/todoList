<?php

use Illuminate\Support\Facades\Route;
use App\Models\Todo;
use App\Http\Controllers\TodoController;

Route::prefix('lists')->group(function(){
    Route::get('/', [TodoController::class, 'lists']);
    Route::post('/', [TodoController::class, 'insertTask']);
    Route::delete('/{id}' ,[TodoController::class, 'delete']); 
    Route::get('/{id}', [TodoController::class, 'updatePage']);
    Route::put('/{id}', [TodoController::class, 'updating']);

});
    

