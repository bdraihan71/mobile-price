<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('mobile_model_id');
            $table->string('technology')->nullable();
            $table->string('_2g_bands')->nullable();
            $table->string('_3g_bands')->nullable();
            $table->string('_4g_bands')->nullable();
            $table->string('_5g_bands')->nullable();
            $table->string('speed')->nullable();
            $table->string('network_other')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('networks');
    }
}
