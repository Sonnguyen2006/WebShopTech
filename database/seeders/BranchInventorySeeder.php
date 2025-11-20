<?php

namespace Database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branch_inventory')->insert([
            ['branch_id' => 1, 'product_id' => 1, 'quantity' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['branch_id' => 1, 'product_id' => 2, 'quantity' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['branch_id' => 2, 'product_id' => 1, 'quantity' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['branch_id' => 2, 'product_id' => 3, 'quantity' => 10, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
