<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultGuardNameToYourTable extends Migration
{
    public function up()
    {
        Schema::table('your_table', function (Blueprint $table) {
            $table->string('guard_name')->default('default_value')->change();
        });
    }

    public function down()
    {
        Schema::table('your_table', function (Blueprint $table) {
            $table->string('guard_name')->default(null)->change();
        });
    }
}