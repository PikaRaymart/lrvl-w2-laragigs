<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller{
	
  function index() {
    
    return view("listings.index", ["listings" => Listing::latest()
      ->filter(request(["tag", "search"]))
      ->paginate(6)
    ]);
  }

  function show(Listing $listing) {

    return view("listings.show", ["listing" => $listing]);
  }

  function create() {
    
    return view("listings.create");
  }

  function store(Request $request) {
    $validated = $request->validate([
      "company" => ["required", Rule::unique("listings", "company")],
      "title" => "required",
      "location" => "required",
      "email" => "required|email",
      "website" => "required",
      "tags" => "required", 
      "description" => "required"
    ]);

    if ($request->hasFile("logo")) {
      $validated["logo"] = $request->file("logo")->store("logos", "public");
    }

    $validated["user_id"] = auth()->id();

    Listing::create($validated);

    return redirect("/")->with("message", "Successfully created listing");
  }

  function edit(Listing $listing) {

    return view('listings.edit', ["listing" => $listing]);
  }

  function update(Request $request, Listing $listing) {
    $validated = $request->validate([
      "company" => "required",
      "title" => "required",
      "location" => "required",
      "email" => "required|email",
      "website" => "required",
      "tags" => "required", 
      "description" => "required"
    ]);

    if ($request->hasFile("logo")) {
      $validated["logo"] = $request->file("logo")->store("logos", "public");
    }

    $listing->update($validated);

    return back()->with("message", "Successfully edited listing");
  }

  function destroy(Listing $listing) {
    $listing->delete();

    return redirect("/")->with("message", "Successfully deleted listing");
  }
}
