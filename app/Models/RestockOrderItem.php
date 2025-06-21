<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class RestockOrderItem extends Model
{
    use HasFactory;
    protected $table = 'restock_order_items';
    protected $fillable = [
        'restock_order_id',
        'product_id',
        'quantity',
    ];
    public function order()
    {
        return $this->belongsTo(RestockOrderItem::class, 'restock_order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
