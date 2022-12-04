<?php

use App\Http\Controllers\FamilyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::view('/','welcome');
Route::get('/family',[FamilyController::class,'index'])->name('family.index');
Route::get('/family/create',[FamilyController::class,'create'])->name('family.create');
Route::post('/family',[FamilyController::class,'store'])->name('family.store');
Route::get('/family/edit/{family}',[FamilyController::class,'edit'])->name('family.edit');
Route::put('/family/{family}',[FamilyController::class,'update'])->name('family.update');
Route::delete('/family/{family}',[FamilyController::class,'destroy'])->name('family.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
