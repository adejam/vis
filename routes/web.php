<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;

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

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::middleware(['auth:sanctum', 'verified'])->get(
    '/dashboard',
    function () {
        return view('dashboard');
    }
)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(
    function () {
        Route::group(
            ['prefix' => '/community'],
            function () {
                Route::get("/", [CommunityController::class, 'index'])->name('community');
                Route::post("/add", [CommunityController::class, 'add'])->name('community.add');
                Route::post("/update", [CommunityController::class, 'update'])->name('community.update');
                Route::post("/delete", [CommunityController::class, 'delete'])->name('community.delete');
            }
        );
    }
);
