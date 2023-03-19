<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("factura_id");
            $table->unsignedBigInteger("articulo_id");
            $table->unsignedBigInteger("cantidad");
            $table->foreign('factura_id')->references('id')->on('facturas');
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas_items');
    }
}
