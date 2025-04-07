<?php

namespace Database\Seeders;

use App\Models\Puppy;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $me = User::factory()->create([
            'name' => 'Me',
        ]);

        $puppyData = [
            [
                'name' => 'Frisket',
                'trait' => 'Mother of all pups',
                'image_url' => url('images/1.jpg'),
            ],
            [
                'name' => 'Chase',
                'trait' => 'Very good boi',
                'image_url' => url('images/2.jpg'),
            ],
            [
                'name' => 'Leia',
                'trait' => 'Enjoys naps',
                'image_url' => url('images/3.jpg'),
            ],
            [
                'name' => 'Pupi',
                'trait' => 'Loves cheese',
                'image_url' => url('images/4.jpg'),
            ],
            [
                'name' => 'Russ',
                'trait' => 'Ready to save the world',
                'image_url' => url('images/5.jpg'),
            ],
            [
                'name' => 'Yoko',
                'trait' => 'Ready for anything',
                'image_url' => url('images/6.jpg'),
            ],
            [
                'name' => 'Luna',
                'trait' => 'Howls at the moon',
                'image_url' => url('images/7.jpg'),
            ],
            [
                'name' => 'Rex',
                'trait' => 'Fetches everything',
                'image_url' => url('images/8.jpg'),
            ],
            [
                'name' => 'Bella',
                'trait' => 'Always happy',
                'image_url' => url('images/9.jpg'),
            ],
        ];

        foreach ($puppyData as $index => $data) {
            $puppy = Puppy::factory()->create($data);
            // Mark puppies 1 and 3 as liked by the "me" user (id: 1)
            if ($index === 0 || $index === 2) {
                $puppy->likedBy()->attach($me->id);
            }
        }
    }
}
