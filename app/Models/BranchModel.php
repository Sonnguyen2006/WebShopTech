<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchModel extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = ['name', 'address', 'phone'];

    public function inventories()
    {
        return $this->hasMany(BranchInventoryModel::class);
    }

    // 1 Branch có nhiều sản phẩm (qua branch_inventory)
    public function products()
    {
        return $this->belongsToMany(ProductModel::class, 'branch_inventory')
                    ->withPivot('quantity') // để lấy số lượng tồn
                    ->withTimestamps();
    }
}
