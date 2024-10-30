<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('order', function (Blueprint $table) {
            $table->string('delivery_name')->nullable()->change();
            $table->string('delivery_gender')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('ledanthuan_order', function (Blueprint $table) {
            $table->string('delivery_name')->nullable(false)->change();
            $table->string('delivery_gender')->nullable(false)->change();
        });
    }
};
