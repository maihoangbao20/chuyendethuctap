<?php

// App\Models\OrderOnline.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderOnline extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shipping_address', 'total_amount', 'status'];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_online_id');
    }
}
