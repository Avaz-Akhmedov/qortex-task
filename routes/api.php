<?php

use App\Http\Controllers\SongCatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/catalog',SongCatalogController::class)->name('catalog');
