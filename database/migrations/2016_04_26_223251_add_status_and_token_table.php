<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class AddStatusAndTokenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('token', 60)->index();
            $table->boolean('alive')->index()->default(false);
            $table->decimal('latitude', 6, 2);
            $table->decimal('longitude', 6, 2);
            $table->dropColumn('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('token');
            $table->dropColumn('alive');
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
            $table->string('email')->unique()->nullable(); // Nullable if users exists
        });
    }
}
