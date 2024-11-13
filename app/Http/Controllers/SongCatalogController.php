<?php

namespace App\Http\Controllers;

use App\Http\Resources\SingerResource;
use App\Models\Singer;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SongCatalogController extends Controller
{
    public function __invoke(): ResourceCollection
    {
        $singers = Singer::query()->with('albums.songs')->paginate(15);

         return SingerResource::collection($singers);
    }
}
