<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone'];

    // 1 Branch có nhiều sản phẩm (qua branch_inventory)
    public function products()
    {
        return $this->belongsToMany(ProductModel::class, 'branch_inventory')
                    ->withPivot('quantity') // để lấy số lượng tồn
                    ->withTimestamps();
    }
}
