<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\GroupsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('', [CobaController::class, 'index']);
Route::resources([
    'friends' => CobaController::class,
    'groups' => GroupsController::class
]);

Route::get('/groups/addmember/{group}', [GroupsController::class, 'addmember']);
Route::get('/groups/updatemember/{group}', [GroupsController::class, 'updatemember']);
Route::get('/groups/deletemember/{group}', [GroupsController::class, 'deletemember']);
