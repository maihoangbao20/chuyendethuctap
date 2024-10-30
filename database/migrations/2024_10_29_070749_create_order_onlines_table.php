<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderOnlinesTable extends Migration
{
    public function up()
    {
        Schema::create('order_onlines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Liên kết với người dùng
            $table->string('shipping_address'); // Địa chỉ giao hàng
            $table->decimal('total_amount', 10, 2); // Tổng tiền
            $table->string('status')->default('pending'); // Trạng thái đơn hàng
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_onlines');
    }
}
