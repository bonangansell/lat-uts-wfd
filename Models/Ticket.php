<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = [
        'movie_id',
        'customer_name',
        'seat_number',
        'is_check_in',
        'check_in_time',
    ];

    public function Movies()
    {
        return $this->belongsTo(Movie::class, 'id');
    }
}
