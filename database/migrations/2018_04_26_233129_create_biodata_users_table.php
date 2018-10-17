<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodataUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->longtext('alamat');
            $table->string('no_telp');
            $table->integer('balance')->default(0);
            $table->longtext('image');
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
        Schema::dropIfExists('biodata_users');
    }
}
