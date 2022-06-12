<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])
    ->middleware(['auth:api']);

Route::get('/brands', [BrandController::class, 'index']);
Route::post('/brands', [BrandController::class, 'store'])
    ->middleware(['auth:api', 'scopes:admin']);

Route::get('/types', [TypeController::class, 'index']);
Route::post('/types', [TypeController::class, 'store'])
    ->middleware(['auth:api', 'scopes:admin']);

Route::get('/baskets', [BasketController::class, 'index'])
    ->middleware(['auth:api']);
Route::post('/baskets', [BasketController::class, 'store'])
    ->middleware(['auth:api']);
Route::delete('/baskets', [BasketController::class, 'destroy'])
    ->middleware(['auth:api']);


// Route::apiResources([
//     'brands' => BrandController::class,
//     'types' => TypeController::class,
//     'baskets' => BasketController::class,
//     'products' => ProductController::class
// ]);
