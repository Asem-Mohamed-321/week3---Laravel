<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\productController;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use PHPUnit\Util\PHP\Job;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

// Route::get('/products', [productController::class,'index']);
// Route::get('/products/create',[productController::class,'create']);
// Route::post('/products', [productController::class,'store']);
// Route::get('/products/{id}',[productController::class,'show']);
// Route::get('/products/{id}/edit',[productController::class,'edit']);
// Route::patch('/products/{id}', [productController::class , 'update']);
// Route::delete('/products/{id}/delete', [productController::class , 'destroy']);
Route::resource('/products',productController::class);




// Route::apiResource("posts",PostController::class);
