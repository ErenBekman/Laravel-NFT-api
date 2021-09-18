<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNftUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nft_user', function (Blueprint $table) {
           $table->unsignedBigInteger('user_id');
           $table->foreign('user_id')
               ->references('id')
               ->on('users')
               ->cascadeOnDelete('delete');

           $table->unsignedBigInteger('nft_id');
           $table->foreign('nft_id')
               ->references('id')
               ->on('nfts')
               ->cascadeOnDelete('delete');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nft_user');
    }
}
