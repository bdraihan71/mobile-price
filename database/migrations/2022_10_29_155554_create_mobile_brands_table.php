<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_brands', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('brand_name');
            $table->string('brand_slug');
            $table->string('brand_image');
            $table->string('brand_title');
            $table->string('brand_description');
            $table->string('brand_Keyword');
            $table->bigInteger('visitor_count')->default(0);
            $table->string('brand_other')->nullable();
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
        Schema::dropIfExists('mobile_brands');
    }
}
