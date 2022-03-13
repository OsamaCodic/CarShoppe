<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use carbon\carbon;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->truncate();

        DB::table('features')->insert(
            array(
                'title' => 'Power Mirrors',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Ajustable side mirrors',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'retractable side mirrors',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Push Start',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Streering Ajustment',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'AC',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Screen Panel (Android)',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => '4 Speakers',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Traction Control',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Lights Adjustment',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Alloys Rim',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Backseats Headrest',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Leather Seats',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Rear Camera',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Sensors',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'Sunroof',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => 'DRL lights',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
        DB::table('features')->insert(
            array(
                'title' => '4 wheel drive',
                'created_at'  => now(),
                'updated_at'  => now(),
            ),
        );
    }
}
