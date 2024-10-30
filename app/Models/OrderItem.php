<?php

// App\Models\OrderItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_online_id', 'product_id', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(OrderOnline::class, 'order_online_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
