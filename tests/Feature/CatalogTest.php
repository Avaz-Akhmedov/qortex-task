<?php

namespace Tests\Feature;

use App\Models\Album;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\TestCase;

class CatalogTest extends TestCase
{
    use DatabaseTransactions;

    public function test_to_see_catalog_with_singers_and_albums()
    {
        $this->createSinger();
        Album::factory(10)->create();
        Song::factory(40)->create();

        $this->getJson(route('catalog'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'albums' => [
                            '*' => [
                                'id',
                                'name',
                                'release_year',
                                'songs' => [
                                    '*' => [
                                        'id',
                                        'title',
                                        'track_number'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'links' => [
                    'first', 'last', 'prev', 'next'
                ],
                'meta' => [
                    'current_page', 'from', 'last_page', 'links', 'path', 'per_page', 'to', 'total'
                ]
            ]);;
    }


    private
    function createSinger(): void
    {
        Singer::query()->create(['name' => 'Eminem']);
        Singer::query()->create(['name' => '50 Cent']);
        Singer::query()->create(['name' => 'Нурминский']);
    }
}
