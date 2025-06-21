<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Supplier;
use App\Models\RestockOrderItem;

class RestockOrder extends Model
{
    use HasFactory;

    protected $table = 'restock_orders';

    protected $fillable = [
        'supplier_id',
        'order_date',
        'status',
    ];

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class, 'supplier_id');
    }

    public function items()
    {
        return $this->hasMany(RestockOrderItem::class, 'restock_order_id');
    }
}
