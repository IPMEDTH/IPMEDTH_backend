<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialhistory', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->String('name');
            $table->integer('amount');
            $table->string('unit');
            $table->string('updated_by');
            $table->string('img_url');
            $table->string('modification');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materialhistory');
    }
}
