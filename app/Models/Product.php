<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    public function images()
    {
        return $this->hasMany(Image::class)->orderBy('order');
    }
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}
