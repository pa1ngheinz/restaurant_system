<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dishes')->insert([
            'name' => 'Steak',
            'category_id' => 1,
            'created_at' => now(),
        ]);

        DB::table('dishes')->insert([
            'name' => 'Sausage Balls',
            'category_id' => 2,
            'created_at' => now(),
        ]);

        DB::table('dishes')->insert([
            'name' => 'Ice Cream',
            'category_id' => 3,
            'created_at' => now(),
        ]);
    }
}
