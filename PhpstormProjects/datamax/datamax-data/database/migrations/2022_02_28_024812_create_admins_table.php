<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('admins', function (Blueprint $table) {
                $table->increments('id')->unique();
                $table->string('name');
                $table->string('login_id')->unique();
                $table->string('password');
                $table->integer('role')->default("0");
                $table->text("remarks")->nullable()->default("");
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
