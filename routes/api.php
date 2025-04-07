<?php

use App\Http\Resources\PuppyResource;
use App\Models\Puppy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ------------------------------
// Get all puppies
// ------------------------------
Route::get('/puppies', function () {
    sleep(1);
    return PuppyResource::collection(Puppy::all());
});

// ------------------------------
// Create new puppy
// ------------------------------
Route::post('/puppies', function (Request $request) {
    sleep(1);
    $validated = $request->validate([
        'name' => 'required|string',
        'trait' => 'required|string',
        'image_url' => 'required|mimes:jpg,jpeg,png|max:2048',
    ]);

    $file = $request->file('image_url');
    $path = $file->store('avatars', 'public');

    $puppy = Puppy::factory()->create(
        [
            ...$validated,
            'image_url' => asset($path)
        ]
    );
    return new PuppyResource($puppy);
});


// ------------------------------
// Toggle like status for a puppy
// ------------------------------
Route::patch('/puppies/{puppy}/like', function (Puppy $puppy) {
    sleep(1);
    $puppy->likedBy()->toggle(1);
    return new PuppyResource($puppy);
});
