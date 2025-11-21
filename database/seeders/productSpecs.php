<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSpecs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ROMs
        DB::table('roms')->insert([
            ['name' => '64GB', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '128GB', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '256GB', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '512GB', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // RAMs
        DB::table('rams')->insert([
            ['name' => '4GB', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '8GB', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '16GB', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '32GB', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Colors
        DB::table('colors')->insert([
            ['name' => 'Red', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Blue', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Black', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'White', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Silver', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
