<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename',
        'product_id',
        'order',
        ];

    // Định nghĩa mối quan hệ ngược lại với Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
