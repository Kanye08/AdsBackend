<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('Y-m-d', 'from');
            $table->date('Y-m-d', 'to');
            $table->float('total_budget', 8, 2)->unsigned();
            $table->float('daily_budget', 8, 2)->unsigned();
            $table->binary('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advert');
    }
}