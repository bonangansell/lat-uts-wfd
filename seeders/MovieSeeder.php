<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("movies")->insert([
        [
            'movie_title' => 'SpiderMan',
            'duration' => 120,
            'release_date' =>'2024-10-14',
        ],
        [
            'movie_title' => 'JamesBond',
            'duration' => 110,
            'release_date' =>'2024-10-19',
        ],
        [
            'movie_title' => 'Transformer',
            'duration' => 100,
            'release_date' =>'2024-10-14',
        ],
        [
            'movie_title' => 'Spongebob',
            'duration' => 90,
            'release_date' =>'2024-10-13',
        ],
        [
            'movie_title' => 'Antman',
            'duration' => 140,
            'release_date' =>'2024-10-20',
        ],
    ]);
    }
}
