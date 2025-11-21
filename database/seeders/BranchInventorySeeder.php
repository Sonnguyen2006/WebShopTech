<?php

namespace Database\seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BranchInventorySeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // Tắt FK để truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('branch_inventory')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $branchIds = [1, 2];
        $allProductIds = range(1, 16); // 16 sản phẩm

        // Chọn 4 product_id sẽ không xuất hiện
        $excludedProducts = collect($allProductIds)->shuffle()->take(4);
        $includedProducts = array_diff($allProductIds, $excludedProducts->toArray());

        $records = [];

        foreach ($branchIds as $branchId) {
            foreach ($includedProducts as $productId) {
                $records[] = [
                    'branch_id' => $branchId,
                    'product_id' => $productId,
                    'quantity' => rand(1, 50),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('branch_inventory')->insert($records);

        echo "Excluded product IDs (not used anywhere): " . implode(',', $excludedProducts->toArray());
    }
}

