<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diseases = [
            ['name' => 'ডায়াবেটিস'],
            ['name' => 'উচ্চ রক্তচাপ'],
            ['name' => 'হৃদরোগ'],
            ['name' => 'একল্যাম্পশিয়া'],
            ['name' => 'প্রসব পরবর্তী অতিরিক্ত রক্তক্ষরণ'],
            ['name' => 'পবিলম্বিত প্রসব'],
            ['name' => 'অপরিণত সন্তান প্রসব'],
            ['name' => 'মৃত সন্তান প্রসব'],
            ['name' => 'নবজাতকের মৃত্যু'],
        ];

        DB::table('diseases')->insert($diseases);
    }
}
