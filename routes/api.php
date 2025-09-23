<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    //Profile
    Route::get('/user', [ProfileController::class, 'profile']);
    Route::patch('/user', [ProfileController::class, 'update']);
    Route::get('/logout', [ProfileController::class, 'logout']);

    //Categories
    Route::get('/categories', [CategoriesController::class, 'categories']);
    Route::get('/categories/{id}', [CategoriesController::class, 'category']);
    Route::post('/categories', [CategoriesController::class, 'store']);
    Route::put('/categories/{id}', [CategoriesController::class, 'update']);
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);


    //medicines
    Route::get('/medicines', [MedicineController::class, 'medicines']);
});
Route::options('{any}', function () {
    return response()->json([], 200);
})->where('any', '.*');


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
