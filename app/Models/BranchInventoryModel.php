<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchInventoryModel extends Model
{
    use HasFactory;

    protected $table = 'branch_inventory';

    protected $fillable = ['branch_id', 'product_id', 'quantity'];

    public function branch()
    {
        return $this->belongsTo(BranchModel::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }
}
