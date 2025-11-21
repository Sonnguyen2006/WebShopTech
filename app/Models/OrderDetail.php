<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $primaryKey = 'order_details_id';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'product_cost'];

    public function order()
{
    return $this->belongsTo(OrderModel::class, 'order_id', 'order_id');
}

    // app/Models/OrderDetail.php
    public function product() {
        return $this->belongsTo(ProductModel::class, 'product_id', 'product_id');
    }

}
