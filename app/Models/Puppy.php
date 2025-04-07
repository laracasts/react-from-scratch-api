<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Puppy extends Model
{
    /** @use HasFactory<\Database\Factories\PuppyFactory> */
    use HasFactory;

    public function likedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
