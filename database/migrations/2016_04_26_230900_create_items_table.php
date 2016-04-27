<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
                $table->string('description', 60);
                $table->boolean('active')->index()->default(false);
                $table->decimal('latitude', 6, 2);
                $table->decimal('longitude', 6, 2);

                $table->integer('giver_id')->unsigned()->notNull();
                $table->foreign('giver_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');

                $table->integer('taker_id')->unsigned()->nullable();
                $table->foreign('taker_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');

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
        Schema::drop('items');
    }
}
