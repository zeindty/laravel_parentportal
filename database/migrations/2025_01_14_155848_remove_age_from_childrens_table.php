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
            $table->dropColumn('age');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('childrens', function (Blueprint $table) {
            $table->integer('age'); // Menambahkan kembali kolom age jika migration di-rollback
        });
    }
};
