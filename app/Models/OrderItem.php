<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'qty',
    ];

    /**
     * Relasi ke Order
     * order_items.order_id → orders.id
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi ke Product
     * order_items.product_id → products.id
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
