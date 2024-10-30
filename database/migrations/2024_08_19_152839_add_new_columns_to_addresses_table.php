<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('newprovince')->nullable()->after('province_name');
            $table->string('newdistrict')->nullable()->after('district_name');
            $table->string('newward')->nullable()->after('ward_name');
        });
    }

    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropColumn(['newprovince', 'newdistrict', 'newward']);
        });
    }
};
