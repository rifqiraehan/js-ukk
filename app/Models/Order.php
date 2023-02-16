<?php

namespace App\Models;

use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'order_status_id',
    ];

    public function OrderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function OrderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}
