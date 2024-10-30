<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamesToAddressesTable extends Migration
{
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('province_name')->nullable()->after('province');
            $table->string('district_name')->nullable()->after('district');
            $table->string('ward_name')->nullable()->after('ward');
        });
    }

    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropColumn(['province_name', 'district_name', 'ward_name']);
        });
    }
}
