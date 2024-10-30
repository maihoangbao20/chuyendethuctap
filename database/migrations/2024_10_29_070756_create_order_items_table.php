<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_online_id')->constrained()->onDelete('cascade'); // Liên kết với đơn hàng
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Liên kết với sản phẩm
            $table->integer('quantity'); // Số lượng
            $table->decimal('price', 10, 2); // Giá sản phẩm
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
