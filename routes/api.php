<?php

use App\Http\Controllers\API\FamilyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//get all family
Route::get('/family',[FamilyController::class,'get_family']);

//rest untuk mendapatkan semua anak Budi
Route::get('/childBudi',[FamilyController::class,'getChildBudi']);

//rest untuk mendapatkan cucu dari budi
Route::get('/grandchildBudi',[FamilyController::class,'getGrandchildBudi']);

//rest untuk mendapatkan cucu perempuan dari budi
Route::get('/granddaughterBudi',[FamilyController::class,'getGranddaughterBudi']);

//rest untuk mendapatkan bibi
Route::get('/aunt',[FamilyController::class,'getAunt']);

//rest untuk mendapatkan sepupu laki-laki dari Hani
Route::get('/maleCousinFromHani',[FamilyController::class,'getMaleCousinFromHani']);