<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller{
	
  function create() {

    return view("users.register");
  }

  function store(Request $request) {
    $validated = $request->validate([
      "name" => "required|min:4",
      "email" => ["required", "email", Rule::unique("users", "email")],
      "password" => "required|confirmed|min:6",
    ]);

    $validated["pasword"] = bcrypt($validated["password"]);

    $user = User::create($validated);

    auth()->login($user);

    return redirect("/")->with("message", "Account registered and logged in");
  }

  function logout(Request $request) {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect("/")->with("message", "Successfully logout");
  }
}
