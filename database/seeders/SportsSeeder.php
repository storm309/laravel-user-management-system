<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportsSeeder extends Seeder
{
    public function run(): void
    {
        $sports = [
            [
                'name'            => 'Football',
                'description'     => 'A team sport played with a spherical ball between two teams of eleven players.',
                'is_olympic_sport' => false,
                'origin_country'  => 'England',
                'first_played_date' => '1863-10-26',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Basketball',
                'description'     => 'A team sport in which two teams score by shooting a ball through a hoop.',
                'is_olympic_sport' => true,
                'origin_country'  => 'United States',
                'first_played_date' => '1891-12-21',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Tennis',
                'description'     => 'A racket sport that can be played individually or between two teams of two players.',
                'is_olympic_sport' => true,
                'origin_country'  => 'France',
                'first_played_date' => '1873-01-01',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Cricket',
                'description'     => 'A bat-and-ball game played between two teams of eleven players on a field.',
                'is_olympic_sport' => false,
                'origin_country'  => 'England',
                'first_played_date' => '1697-01-01',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'name'            => 'Swimming',
                'description'     => 'An individual or team sport that requires the use of arms and legs to move through water.',
                'is_olympic_sport' => true,
                'origin_country'  => 'England',
                'first_played_date' => '1896-04-06',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ];

        DB::table('sports')->insert($sports);
    }
}
