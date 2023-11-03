<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::options('/', function (Request $request) {
    $requestedMethod = $request->header('Access-Control-Request-Method');
    // if method is LINK fail
    if ($requestedMethod === 'LINK') {
        return response()->json(['message' => 'LINK HTTP Method is not allowed'], 403);
    }

    $userAgent = Str::lower($request->header('User-Agent'));
    // if request is sent from postman fail
    if (Str::contains($userAgent, 'postman')) {
        return response()->json(['message' => 'Postman is not allowed'], 403);
    }

    return response()->json(['message' => 'Request Allowed'], 200);
});

Route::get('/', function (Request $request) {
    $address = $request->ip();
    $headers = $request->headers->all();
    $header1 = $request->header('header1');
    $name = $request->query('name');
    return response()->json(['success' => true], 200);
});

Route::post('/', function (Request $request) {
    $allData = $request->all();
    $onlyTextFields = $request->except(['photo']);
    dd($allData, $onlyTextFields);
    $photo = $request->file('photo');
    $filename = $photo->getClientOriginalName() . '-' . time() . '.' . $photo->extension();
    $photo->storeAs('photos', $filename, 'public');
    return response()->json(['success' => true], 201);
});

Route::post('/{id}', function (Request $request) {
    $queryParamsAndBody = $request->all();
    $body = $request->json()->all();
    $routeParams = $request->route()->parameters();
    dd($queryParamsAndBody, $body, $routeParams);
    return response()->json(['success' => true], 201);
});

Route::put('/', function (Request $request) {
    $data = $request->all();
    Log::info($data);
    return response()->json(['success' => true], 200);
});

Route::patch('/', function (Request $request) {
    $data = $request->all();
    Log::info($data);
    return response()->json(['success' => true], 200);
});

Route::delete('/', function (Request $request) {
    $data = $request->all();
    Log::info($data);
    return response()->json(['success' => true], 200);
});
