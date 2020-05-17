<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaybooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daybooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('daybookCategory_id')
                ->unsigned();
            $table->string('description', 50);
            $table->float('price', 8, 2);
            $table->string('date', 50);

            $table->foreign('daybookCategory_id')
                ->references('id')->on('daybookcategories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daybooks');
    }
}
