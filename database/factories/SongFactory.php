<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;


class SongFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'album_id' => Album::query()->inRandomOrder()->first()->id,
            'track_number' => $this->faker->randomDigit(),
        ];
    }
}
