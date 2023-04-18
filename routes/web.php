<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

Route::get("/", [ListingController::class, "index"]);

// Show the create form for creating a gib
Route::get("/listings/create", [ListingController::class, "create"])->middleware("auth");

// Show a single listing or gig
Route::get("/listings/{listing}", [ListingController::class, "show"]);

// Create a listing
Route::post("/listings", [ListingController::class, "store"])->middleware("auth");

// Shows the form for editing a listing or gig
Route::get("/listings/{listing}/edit", [ListingController::class, "edit"])->middleware("auth");

// Update a listing or gig
Route::put("/listings/{listing}", [ListingController::class, "update"])->middleware("auth");

// Delete a listing or gig
Route::delete("/listings/{listing}", [ListingController::class, "destroy"])->middleware("auth");

// Shows the form for registering as a new user
Route::get("/register", [UserController::class, "create"])->middleware("guest");

// Create new user
Route::post("/users", [UserController::class, "store"]);

// Logout user
Route::post("/logout", [UserController::class, "logout"]);

// Login user
Route::get("/login", [UserController::class, "login"])->name("login")->middleware("guest");

// Authenticate user
Route::post("/users/authenticate", [UserController::class, "authenticate"]);