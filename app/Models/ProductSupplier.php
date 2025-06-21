<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{
    use HasFactory;

    protected $table = 'product_supplier'; // 👈 pivot table name

    protected $fillable = [
        'product_id',
        'supplier_id',
    ];

    // Connect to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Connect to Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
