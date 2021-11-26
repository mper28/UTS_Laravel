<?php

use App\Http\Controllers\Api\CobaController;
use App\Http\Controllers\Api\GroupsController;
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

Route::get('', [CobaController::class, 'index']);
Route::get('/friends', [CobaController::class, 'index']);
Route::get('/friends/create', [CobaController::class, 'create']);
Route::post('/friends', [CobaController::class, 'store']);
Route::get('/friends/{id}', [CobaController::class, 'show']);
Route::get('/friends/{id}/edit', [CobaController::class, 'edit']);
Route::put('/friends/{id}', [CobaController::class, 'update']);
Route::delete('/friends/{id}', [CobaController::class, 'destroy']);

Route::resources([
    'friends' => CobaController::class,
    'groups' => GroupsController::class,
]);

Route::get('/groups/addmember/{group}', [GroupsController::class, 'addmember']);
Route::put('/groups/addmember/{group}', [GroupsController::class, 'updatemember']);
Route::put('/groups/deletemember/{group}', [GroupsController::class, 'deletemember']);