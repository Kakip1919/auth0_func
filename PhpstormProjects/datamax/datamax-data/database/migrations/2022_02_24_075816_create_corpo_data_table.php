<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorpoDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corpo_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("registered_number")->unique()->nullable();
            $table->bigInteger("process")->nullable();
            $table->bigInteger("correct")->nullable();
            $table->bigInteger("kind")->nullable();
            $table->bigInteger("country")->nullable();
            $table->bigInteger("latest")->nullable();
            $table->dateTime("registration_date")->default('1900-01-01 00:00:00')->nullable();
            $table->dateTime("update_date")->default('1900-01-01 00:00:00')->nullable();
            $table->dateTime("disposal_date")->default('1900-01-01 00:00:00')->nullable();
            $table->dateTime("expire_date")->default('1900-01-01 00:00:00')->nullable();
            $table->text("address")->nullable();
            $table->bigInteger("address_prefecture_code")->nullable();
            $table->bigInteger("address_city_code")->nullable();
            $table->text("address_request")->nullable();
            $table->bigInteger("address_request_prefecture_code")->nullable();
            $table->bigInteger("address_request_city_code")->nullable();
            $table->text("kana")->nullable();
            $table->text("name")->nullable();
            $table->text("address_inside")->nullable();
            $table->bigInteger("address_inside_prefecture_code")->nullable();
            $table->bigInteger("address_inside_city_code")->nullable();
            $table->text("trade_name")->nullable();
            $table->text("popular_name_previous_name")->nullable();
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corpo_data');
    }
}
