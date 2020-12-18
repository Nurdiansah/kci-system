<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimbangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timbangans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal', null);
            $table->string('kode_plant');
            $table->string('nama_spbe');
            $table->string('wilayah');
            $table->string('no_spa');
            $table->string('status_spa');
            $table->integer('rencana_muat');
            $table->string('no_pol');
            $table->string('sopir');
            $table->string('po_number');
            $table->string('no_lo');
            $table->integer('weight_out');
            $table->integer('weight_in');
            $table->integer('netto');
            $table->string('roto_gauge');
            $table->string('no_segel_liquid');
            $table->string('no_segel_vapour');
            $table->string('no_segel_box');
            $table->time('jam_in');
            $table->time('jam_out');
            $table->time('waktu_pengisian');
            $table->integer('mysap');
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
        Schema::dropIfExists('timbangans');
    }
}
