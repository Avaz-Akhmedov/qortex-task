<?php

namespace Database\Factories;

use App\Models\Singer;
use Illuminate\Database\Eloquent\Factories\Factory;


class AlbumFactory extends Factory
{

    public function definition(): array
    {
        return [
            'singer_id' => Singer::query()->inRandomOrder()->first()->id,
            'release_year' => $this->faker->date(),
            'name' => $this->faker->name(),
        ];
    }
}
