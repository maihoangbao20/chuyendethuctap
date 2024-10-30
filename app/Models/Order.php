<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Đảm bảo tên bảng đúng
    protected $table = 'ledanthuan_order'; // Đảm bảo bảng đúng

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'address',
        'note',
        'delivery_name', // Thêm trường giao hàng nếu cần
        'delivery_gender', // Thêm trường giới tính giao hàng nếu cần
        'created_by',
        'updated_by'
    ];

    // Bạn có thể thêm các phương thức quan hệ ở đây, ví dụ:
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
