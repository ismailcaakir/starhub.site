<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('repo_id')->unique();
            $table->string('name')->unique();
            $table->boolean('archived')->default(false);
            $table->boolean('disabled')->default(false);
            $table->boolean('fork')->default(false);
            $table->bigInteger('stargazers_count')->default(0);
            $table->json('repo_data')->default(NULL);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repo');
    }
}
