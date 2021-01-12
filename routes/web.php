<?php

use App\Http\Controllers\LotteryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});

Route::get('/lotteries', [LotteryController::class,'index'])->name('lotteries.index');
Route::get('/lotteries/create', [LotteryController::class,'create'])->name('lotteries.create');
Route::post('/lotteries', [LotteryController::class,'store']);
Route::get('/lotteries/{id}/edit',  [LotteryController::class,'edit'])->name('lotteries.edit');
Route::put('/lotteries/{id}',  [LotteryController::class,'update']);
Route::delete('/lotteries/{id}',  [LotteryController::class,'destroy']);

Auth::routes();
