<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecsModel extends Model
{
    use HasFactory;
    protected $table = 'product_specs';
    protected $fillable = [
        'product_id',
        'screen',
        'size',
        'weight',
        'features',
        'os'
    ];

    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }
    
}
