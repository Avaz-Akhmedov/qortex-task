<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'singer_id',
        'release_year',
        'name'
    ];

    public function singer(): BelongsTo
    {
        return $this->belongsTo(Singer::class);
    }

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }
}
