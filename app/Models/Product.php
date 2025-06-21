<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Supplier;  // Import Supplier model

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'product_code',
        'brand',
        'category_id',
        'supplier_id',
        'price',
        'cost_price',
        'quantity',
        'low_stock_alert',
        'unit',
        'image',
        'description',
    ];

    /**
     * Define the inverse relation: Each product belongs to one supplier.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function category()
{
    return $this->belongsTo(Category::class);
}
public function suppliers()
{
    return $this->belongsToMany(Supplier::class, 'product_supplier');
}


}
