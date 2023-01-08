<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_models', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('mobile_brand_id')->nullable();
            $table->string('model_colors')->nullable();
            $table->string('model_name');
            $table->string('model_slug')->nullable();
            $table->string('model_image')->nullable();
            $table->string('model_title')->nullable();
            $table->string('model_description')->nullable();
            $table->string('model_Keyword')->nullable();
            $table->bigInteger('visitor_count')->default(0);
            $table->string('model_other')->nullable();
            $table->string('model_type')->nullable();
            $table->text('highlight')->nullable();
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->text('questions')->nullable();
            $table->boolean('is_published')->default(false);
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
        Schema::dropIfExists('mobile_models');
    }
}
