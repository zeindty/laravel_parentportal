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
        Schema::table('childrens', function (Blueprint $table) {
            $table->string('NISN')->nullable()->after('name'); // Kolom NISN setelah kolom name
            $table->string('class')->nullable()->after('NISN'); // Kolom class setelah kolom NISN
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('childrens', function (Blueprint $table) {
            $table->dropColumn(['NISN', 'class']);
        });
    }
};

