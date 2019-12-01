<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lendings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('movies_id');
            $table->string('member_id');
            $table->date('date_lending');
            $table->date('date_returned');
            $table->date('date_returned_actual');
            $table->float('lateness_charge');
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
        Schema::dropIfExists('lendings');
    }
}
