<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'order_id','user_id', 'username', 'email', 'address', 
        'total_amount', 'status', 'payment_method'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id','user_id');
    }
}
