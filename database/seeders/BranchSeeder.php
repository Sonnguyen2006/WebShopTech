<?php

namespace Database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert([
            [
                'name' => 'Chi nhánh Hà Nội',
                'address' => '123 Đường A, Hà Nội',
                'phone' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chi nhánh TP.HCM',
                'address' => '456 Đường B, TP.HCM',
                'phone' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
