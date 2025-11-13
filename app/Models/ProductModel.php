<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductModel extends Model
{
        use HasFactory;

    protected $table = 'products'; // tên bảng trong DB

    protected $fillable = [//lấy những dữ liệu trong DB
        'product_id',
        'product_name',
        'product_image',
        'product_cost',
        'discount',
        'description',
        'category',
        'rating',
    ];
    public function getFinalPriceAttribute()
{
    if ($this->discount > 0) {
        return $this->product_cost * (1 - $this->discount / 100);
    }

    return $this->product_cost;
}
}
