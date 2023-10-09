<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screenings', function (Blueprint $table) {
            $table->id();
            $table->string('namaLengkap');
            $table->string('alamat');
            $table->string('phone');
            $table->string('nik');
            $table->string('work');
            $table->string('born');
            $table->string('gender');
            $table->string('batuk');
            $table->string('bb');
            $table->string('demam');
            $table->string('lemas');
            $table->string('keringat');
            $table->string('sesak');
            $table->string('getah');
            $table->string('jangkit');
            $table->string('lainnya');
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
        Schema::dropIfExists('screening');
    }
};
