<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;  // Import Product model

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_person',
        'email',
        'phone',
        'address',
    ];

    /**
     * One Supplier supplies many Products.
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function products()
{
    return $this->belongsToMany(Product::class, 'product_supplier');
}

}
