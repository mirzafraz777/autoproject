<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('packages')->insert([
            [
                'name'=>'Package-1',
                'price'=>'100.00',
                'image'=>'package_default.png',
                'type'=>false,
                'cat_id'=>1,
                'no_of_days'=>100,
                'counter'=>4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Package-2',
                'price'=>'200.00',
                'image'=>'package_default.png',
                'type'=>false,
                'cat_id'=>2,
                'no_of_days'=>200,
                'counter'=>2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Package-3',
                'price'=>'300.00',
                'image'=>'package_default.png',
                'type'=>true,
                'cat_id'=>4,
                'no_of_days'=>400,
                'counter'=>4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Package-4',
                'price'=>'400.00',
                'image'=>'package_default.png',
                'type'=>false,
                'cat_id'=>1,
                'no_of_days'=>100,
                'counter'=>5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=>'Package-5',
                'price'=>'1000.00',
                'image'=>'package_default.png',
                'type'=>false,
                'cat_id'=>4,
                'no_of_days'=>300,
                'counter'=>4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
