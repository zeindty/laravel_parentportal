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
    // Menghapus tabel lama
    Schema::dropIfExists('reports');

    // Membuat tabel dengan urutan kolom baru
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->string('child_name');
        $table->string('teacher_name'); // Kolom baru
        $table->string('class');
        $table->string('status');
        $table->date('report_date');
        $table->string('category');
        $table->text('description');
        $table->integer('scores')->nullable(); // Kolom baru
        $table->string('club')->nullable(); // Kolom baru
        $table->text('teacher_notes')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('reports');
}

};
