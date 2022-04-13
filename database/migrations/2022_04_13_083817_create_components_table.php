<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")
                ->references("id")
                ->on("products")
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table->foreignId("component_id")
                ->references("id")
                ->on("products")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->unique(["product_id","component_id"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
}
