<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'order_id', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }
}
