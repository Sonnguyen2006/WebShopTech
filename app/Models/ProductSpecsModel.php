<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpecsModel extends Model
{
    protected $table = 'product_specs'; // tên bảng trong DB

    protected $fillable = [ //lấy những dữ liệu trong DB
        'product_id',
        'sceen',
        'size',
        'weight',
        'features',
        'os',
    ];
    public function product(){
        return $this->belongsTo(ProductModel::class, 'product_id','product_id');
    }
}

