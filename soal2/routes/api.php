<?php


namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/bus', [BusController::class, 'index']);      // ambil semua user
Route::post('/bus', [BusController::class, 'store']);     // tambah user
Route::get('/bus/{id}', [BusController::class, 'show']);  // detail user
Route::put('/bus/{id}', [BusController::class, 'update']); // update user
Route::delete('/bus/{id}', [BusController::class, 'destroy']); // hapus user