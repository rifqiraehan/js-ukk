<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'sub_total',
        'quantity',
        'order_status_id',
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function OrderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}
