<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\ProvinsiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('provinsi',[ApiController::class,'provinsi']);
// Route::get('provinsi/{id}',[ApiController::class,'provinsi.kota']);
 

// Route::get('/posts',[PostController::class,'index']);
// Route::get('/posts',[PostController::class,'store']);
// Route::get('/posts/{id}',[PostController::class,'show']);
// Route::put('/posts/update/{id}',[PostController::class,'update']);
// Route::delete('/posts/{id}',[PostController::class,'destroy']);

Route::get('/hari', [ProvinsiController::class,'hari']);
Route::get('/indo', [ProvinsiController::class,'indonesia']);
Route::get('/provinsi1/{id}', [ProvinsiController::class,'provinsi']);
Route::get('/provinsi2', [ProvinsiController::class,'provinsi1']);
Route::get('/kota', [ProvinsiController::class,'kota']);
Route::get('/kecamatan', [ProvinsiController::class,'kecamatan']);
Route::get('/desa', [ProvinsiController::class,'desa']);


// API Provinsi
Route::get('provinsi', [ProvinsiController::class, 'index']);
Route::post('provinsi', [ProvinsiController::class, 'store']);
Route::get('provinsi/{id}', [ProvinsiController::class, 'show']);
Route::post('provinsi/update/{id}', [ProvinsiController::class, 'update']);
Route::delete('/provinsi/{id}', [ProvinsiController::class, 'destroy']);

////
Route::get('/indonesia', [ProvinsiController::class, 'indonesia']);
Route::get('/positif', [ProvinsiController::class, 'positif']);
Route::get('/sembuh', [ProvinsiController::class, 'sembuh']);
Route::get('/meninggal', [ProvinsiController::class, 'meninggal']);

Route::get('/provinsi', [ProvinsiController::class, 'provinsi']);
Route::get('/provinsi/{id}', [ProvinsiController::class, 'showProvinsi']);

Route::get('/posts', [PostsController::class, 'index']);
Route::post('/posts/store', [PostsController::class, 'store']);
Route::get('/posts/{id}', [PostsController::class, 'show']);
Route::put('/posts/update/{id}', [PostsController::class, 'update']);
Route::delete('/posts/{id?}', [PostsController::class, 'destroy']);
Route::get('/kota', [ProvinsiController::class,'kota']);
Route::get('/kecamatan', [ProvinsiController::class,'kecamatan']);
Route::get('/desa', [ProvinsiController::class,'desa']);
Route::get('/rw', [ProvinsiController::class,'rw']);