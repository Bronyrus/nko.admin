<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_to_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('messenger_id')->unsigned();
            $table->text('messange');
            $table->boolean('direction');

            $table->timestamps();

            $table->foreign('messenger_id')->references('id')->on('messengers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_to_messages');
    }
}
