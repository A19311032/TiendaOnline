<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_details', function (Blueprint $table) {
            
            $table->integer('sale_id')->after('id');
            $table->integer('amount')->after('sale_id');
            $table->double('price')->after('downpayment');
            $table->dropColumn('customer_id');
            $table->dropColumn('downpayment');
        });

        Schema::table('sales', function(Blueprint $table){
            $table->integer('method')->after('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_details', function (Blueprint $table) {
            
            $table->dropColumn('sale_id');
            $table->dropColumn('price');
            $table->dropColumn('amount');
            $table->integer('customer_id')->after('product_id');
            $table->double('downpayment')->after('product_id');
            
        });

        Schema::table('sales', function(Blueprint $table){
            $table->dropColumn('method');
        });
    }
};
