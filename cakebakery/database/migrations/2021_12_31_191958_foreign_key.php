<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Khóa ngoại của menu_detail và product
        //mabanh trong menu-_detail là khóa ngoại
        //mamenu trong menu-_detail là khóa ngoại
        Schema::table('menu_details', function (Blueprint $table) {
            $table->foreign('mabanh')->references('id')->on('products');
            $table->foreign('mamenu')->references('id')->on('menus');
        });


        //Khóa ngoại của account và invoice
        //mamtk trong invoice là khóa ngoại
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('matk')->references('id')->on('accounts');
        });

        //Khóa ngoại của menu và employee
        //nvlap trong menu là khóa ngoại
        Schema::table('menus', function (Blueprint $table) {
            $table->foreign('nvlap')->references('id')->on('accounts');
        });

        //Khóa ngoại của invoice_detail và product
        //mabanh trong menu_detail là khóa ngoại
        //mahd trong menu_detail là khóa ngoại
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->foreign('mabanh')->references('id')->on('products');
            $table->foreign('mahd')->references('id')->on('invoices');
        });


        //Khóa ngoại của invoice và employee
        //nvlap trong invoice là khóa ngoại
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('nvlap')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
