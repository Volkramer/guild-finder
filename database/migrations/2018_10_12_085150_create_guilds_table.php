<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guilds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guild_name')->unique();
            $table->string('server');
            $table->string('faction');
            $table->string('gameplay')->nullable();
            $table->boolean('jce')->default(0);
            $table->boolean('jcj')->default(0);
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::table('characters', function (Blueprint $table) {
            $table->integer('guild_id')->unsigned()->index()->nullable();
        });

        Schema::create('guild_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('guild_id');
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
        Schema::dropIfExists('guilds');
        Schema::dropIfExists('guild_user');
    }
}
