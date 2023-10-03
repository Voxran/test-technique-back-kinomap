<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert 50 fake activites
        // Can do it with Activity::factory()->count(50) but don't have time to read the doc
        for($i = 0; $i < 50; $i++){
            DB::table('activities')->insert([
                'name' => Str::random(10),
                'description' => Str::random(30),
                // Get random time with leading 0, no more than 4 hours
                'duration' => str_pad(rand(0,4), 2, '0', STR_PAD_LEFT).':'.str_pad(rand(0,59), 2, '0', STR_PAD_LEFT).':'.str_pad(rand(0,59), 2, '0', STR_PAD_LEFT) 
            ]);
        }
    }
}
