<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('reports', function (Blueprint $table) {
        $table->string('teacher_name')->nullable();
        $table->integer('scores')->nullable();
        $table->string('club')->nullable();
    });
}

public function down()
{
    Schema::table('reports', function (Blueprint $table) {
        $table->dropColumn(['teacher_name', 'scores', 'club']);
    });
}

};
