<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('cart_id');
            $table->bigInteger("user_id")->unsigned();
            $table->boolean("cart_active");
            $table->integer('cart_qty');
            $table->bigInteger("fig_id")->unsigned();
            $table->bigInteger("trans_id")->unsigned()->nullable();

            $table->foreign("fig_id")->references("fig_id")->on("figures")->onDelete('cascade');
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("trans_id")->references("trans_id")->on("transactions")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
