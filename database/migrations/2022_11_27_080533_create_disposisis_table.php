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
        Schema::create('disposisi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tujuan');
            $table->foreign('tujuan')->references('id')->on('jenis_jabatan');
            $table->string('catatan');
            $table->string('sifat');
            $table->boolean('done');
            $table->string('tanggapan')->nullable();
            $table->string('sebar')->nullable();
            $table->boolean('read');
            $table->unsignedBigInteger('sm_id');
            $table->foreign('sm_id')->references('id')->on('surat_masuk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disposisi');
    }
};
