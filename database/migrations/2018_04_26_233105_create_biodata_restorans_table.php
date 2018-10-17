<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodataRestoransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_restorans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->longtext('deskripsi');
            $table->longtext('alamat');
            $table->string('no_telp');
            $table->string('jenis');
            $table->longtext('image1');
            $table->longtext('image2');
            $table->longtext('image3');
            $table->longtext('image4');
            $table->longtext('image5');
            $table->integer('balance')->default('0');
            $table->tinyinteger('lengkap')->default(0);
            $table->tinyinteger('verified')->default(0);
            $table->longtext('denah')->nullable();
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
        Schema::dropIfExists('biodata_restorans');
    }
}
