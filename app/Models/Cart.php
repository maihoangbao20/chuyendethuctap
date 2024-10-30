<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // protected $table = 'carts';
    protected $fillable = ['user_id', 'product_id', 'quantity', 'price'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public static function getItems()
    {
        // Logic to retrieve all cart items, e.g., from the session or database
        return session()->get('cart', []); // Assumes cart data is stored in session
    }

    public static function getTotal()
    {
        $items = self::getItems();

        // Calculate total cost
        return array_reduce($items, function ($total, $item) {
            return $total + ($item['price'] * $item['quantity']);
        }, 0);
    }
}
