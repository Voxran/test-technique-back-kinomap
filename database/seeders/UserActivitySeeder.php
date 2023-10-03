<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert fake activies for limited number of users (15) 
        for($i = 1; $i < 16; $i++){

            // Multiple activities by user
            $numberOfActivities = rand(0,20);
            for($j = 1; $j < $numberOfActivities; $j++){

                $numberOfPoints = rand(5,30);
                for($k = 0; $k < $numberOfPoints; $k++){
                    DB::table('activity_data')->insert([
                        'user_id' => $i,
                        'activity_id' => $j,
                        'point_in_time' => date('Y/m/d H:i:s'), // IRL need to be between duration time of activity
                        'speed' => rand(0,25)
                    ]);
                }
            }
        }
    }
}
