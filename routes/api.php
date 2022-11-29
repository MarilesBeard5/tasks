<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/task')->group( function () {
    Route::get(
        '/index',
        [TaskController::class, 'index']
    )->name('app.task.index');

    Route::get(
        '/create',
        [TaskController::class, 'create']
    )->name('app.task.create');

    Route::post(
        '/store',
        [TaskController::class, 'store']
    )->name('app.task.store');

    Route::get(
        '/show/{id}',
        [TaskController::class, 'show']
    )->name('app.task.show');

    Route::get(
        '/edit/{id}',
        [TaskController::class, 'edit']
    )->name('app.task.edit');

    Route::put(
        '/update/{id}',
        [TaskController::class, 'update']
    )->name('app.task.update');

    Route::delete('/destroy/{id}',
        [TaskController::class, 'destroy']
    )->name('app.task.destroy');

});
