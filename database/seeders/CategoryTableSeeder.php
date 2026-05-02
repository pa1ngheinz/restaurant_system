<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Main',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Appetizer',
            'created_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Dessert',
            'created_at' => now(),
        ]);
    }
}
