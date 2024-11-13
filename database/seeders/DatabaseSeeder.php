<?php

namespace Database\Seeders;

use App\Models\Singer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->createSinger();

        $this->call([
            AlbumSeeder::class,
            SongSeeder::class,
        ]);
    }

    private function createSinger(): void
    {
        Singer::query()->create(['name' => 'Eminem']);
        Singer::query()->create(['name' => '50 Cent']);
        Singer::query()->create(['name' => 'Нурминский']);
    }
}
