<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("resource_name");
            $table->string("type")->default("");
            $table->tinyinteger("count")->default(0);
            $table->string("identification_code")->nullable();
            $table->string("identification_code_name")->default("");
            $table->boolean("download")->default(0);
            $table->boolean("web_api")->default(0);
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
        Schema::dropIfExists('descriptions');
    }
}
