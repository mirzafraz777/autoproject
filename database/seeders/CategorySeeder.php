<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_name'=>'VIP-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name'=>'VIP-2',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'category_name'=>'VIP-3',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'category_name'=>'VIP-4',
                'created_at' => now(),
                'updated_at' => now(),

            ]
        ]);
    }
}
