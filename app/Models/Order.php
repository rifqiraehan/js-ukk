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

    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // add a relationship to the OrderStatus model
    public function OrderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
