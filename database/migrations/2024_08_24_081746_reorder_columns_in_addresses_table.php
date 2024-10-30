<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReorderColumnsInAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            // Tạo các cột mới trước cột province_id
            $table->string('name')->nullable()->after('id'); // Sau cột id
            $table->string('phone')->nullable()->after('name'); // Sau cột name
            $table->tinyInteger('status')->default(2)->after('phone'); // Sau cột phone
        });
    }

    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            // Xóa các cột mới trong phương thức down
            $table->dropColumn(['name', 'phone', 'status']);
        });
    }
}
