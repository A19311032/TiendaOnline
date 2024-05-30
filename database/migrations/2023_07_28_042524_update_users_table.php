<?php

use Doctrine\DBAL\Schema\Table;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * Actualizar con una migración el campo nivel default a tipo cliente
     *Actualizar con una migración el campo status default a 1
     *Actualizar con una migración los campos brand y social not null
     */
    public function up()
    {
        Schema::table('users',function($table){
            $table->integer('level')->default(3)->change();
            $table->integer('status')->default(1)->change();
            $table->string('brand')->nullable()->change();
            $table->string('social')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function($table){
            $table->integer('level')->change();
            $table->integer('status')->change();
            $table->string('brand')->change();
            $table->string('social')->change();
        });
    }
};