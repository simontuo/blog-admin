<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHttpMethodAndHttpPathForPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->json('http_method')->nullable()->after('display_name')->comment('HTTP方法');
            $table->text('http_path')->nullable()->after('http_method')->comment('HTTP路径');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn(['http_method', 'http_method']);
        });
    }
}
