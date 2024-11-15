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
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->date('date');
        $table->string('category');
        $table->text('description');
        $table->string('image')->nullable();  // Menyimpan gambar event, nullable jika tidak ada gambar
        $table->string('status')->default('active');  // Status event, default 'active'
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('events');
}

};
