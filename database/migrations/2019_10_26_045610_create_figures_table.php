<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiguresTable extends Migration
{
    public function up()
    {
        Schema::create('figures', function (Blueprint $table) {
            $table->bigIncrements('fig_id');
            $table->string("fig_name");
            $table->text("fig_desc");
            $table->bigInteger("cat_id")->unsigned();
            $table->bigInteger("fig_price");
            $table->integer("fig_stock");
            $table->binary('fig_pic');

            $table->foreign("cat_id")->references("cat_id")->on("categories")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('figures');
    }
}
