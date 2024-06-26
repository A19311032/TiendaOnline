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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('silueta');
            $table->string('modelo');
            $table->integer('talla');
            $table->string('estado');
            $table->string('condicion');
            $table->integer('cantidad');
            $table->string('imagen'); 
            $table->string('descripcion');
            $table->integer('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
}; 
