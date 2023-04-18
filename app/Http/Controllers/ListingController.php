<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller{
	function index() {
    
    return view("listings.index", ["listings" => Listing::latest()
    ->filter(request(["tag", "search"]))
    ->get()]);
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

    Listing::create($validated);

    return redirect("/")->with("message", "Successfully created listing");
  }
}