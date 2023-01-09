<?php

use App\Http\Resources\AdvertResource;
use App\Models\Advert;
use Illuminate\Http\Request;
use App\Http\Controllers\AdvertController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// For all ads
Route::get('/adverts', function () {
    return AdvertResource::collection(Advert::all());
});

// To post new ad
Route::post('/adverts', [AdvertController::class, 'store']);


// For specific ad
Route::get('/adverts/{id}', [AdvertController::class, 'show']);

// To update ad
Route::put('/adverts/{id}', [AdvertController::class, 'update']);

// To delete ad
Route::delete('/adverts/{id}', [AdvertController::class, 'destroy']);