<?php

use App\Http\Controllers\ComplaintController;
use App\Models\Complaint;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('swagger');
});

Route::get('/complaints/{complaint}', [ComplaintController::class, 'show']);
