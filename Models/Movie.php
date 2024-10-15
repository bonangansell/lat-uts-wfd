<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movies';
    protected $fillable = [
        'movie_title',
        'duration',
        'release_date',
    ];
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'movie_id');
    }
}
