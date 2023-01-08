<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connectivities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('mobile_model_id');
            $table->string('wlan')->nullable();
            $table->string('bluetooth')->nullable();
            $table->string('positioning')->nullable();
            $table->string('nfc')->nullable();
            $table->string('infrared_port')->nullable();
            $table->string('radio')->nullable();
            $table->string('usb')->nullable();
            $table->string('connectivity_other')->nullable();
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
        Schema::dropIfExists('connectivities');
    }
}
