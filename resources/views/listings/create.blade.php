<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Create a Gig</h2>
      <p class="mb-4">Post a gig to find a developer</p>
    </header>
    <form action="/listings" method="post">
      @csrf
      <div class="mb-6">
        <label for="company"
          class="inline-block text-lg mb-2">Company Name
        </label>  
        <input type="text" name="company" id="company"
          class="border border-gray-200 rounded p-2 w-full" />
        @error("company")
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="title"
          class="inline-block text-lg mb-2">Job Title
        </label>  
        <input type="text" name="title" id="title"
          class="border border-gray-200 rounded p-2 w-full" />
        @error("title")
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="location"
          class="inline-block text-lg mb-2">Job Location
        </label>  
        <input type="text" name="location" id="location"
          class="border border-gray-200 rounded p-2 w-full" />
        @error("location")
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror  
      </div>
      <div class="mb-6">
        <label for="email"
          class="inline-block text-lg mb-2">Contact Email
        </label>  
        <input type="text" name="email" id="email"
          class="border border-gray-200 rounded p-2 w-full" />
        @error("email")
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror  
      </div>
      <div class="mb-6">
        <label for="website"
          class="inline-block text-lg mb-2">Website/Application URL
        </label>  
        <input type="text" name="website" id="website"
          class="border border-gray-200 rounded p-2 w-full" />
        @error("website")
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="tags"
          class="inline-block text-lg mb-2">Tags (Comma Separated)
        </label>  
        <input type="text" name="tags" id="tags"
          class="border border-gray-200 rounded p-2 w-full" />
        @error("tags")
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
      {{-- <div class="mb-6">
        <label for="logo"
          class="inline-block text-lg mb-2">Company Logo
        </label>  
        <input type="file" name="logo" id="logo"
          class="border border-gray-200 rounded p-2 w-full" />
      </div> --}}
      <div class="mb-6">
        <label for="description"
          class="inline-block text-lg mb-2">Job Description
        </label>  
        <textarea name="description" rows="10" placeholder="Include tasks, requirements, salary, etc" id="description"
          class="border border-gray-200 rounded p-2 w-full"></textarea>
        @error("description")
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" type="submit">Create Gig
        </button>
        <a href="/" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-layout>