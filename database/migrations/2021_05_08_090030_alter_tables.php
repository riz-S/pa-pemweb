<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dataDiri', function (Blueprint $table) {
            $table->foreign('userId')->references('userId')->on('users');
        });
        
        Schema::table('komunitas', function (Blueprint $table) {
            $table->foreign('ketuaId')->references('anggotaId')->on('anggota');
        });
        
        Schema::table('divisi', function (Blueprint $table) {
            $table->foreign('komunitasId')->references('komunitasId')->on('komunitas');
            $table->foreign('ketuaId')->references('anggotaId')->on('anggota');
        });
        
        Schema::table('proker', function (Blueprint $table) {
            $table->foreign('divisiId')->references('divisiId')->on('divisi');
            $table->foreign('komunitasId')->references('komunitasId')->on('komunitas');
        });
        
        Schema::table('anggota', function (Blueprint $table) {
            $table->foreign('divisiId')->references('divisiId')->on('divisi');
            $table->foreign('komunitasId')->references('komunitasId')->on('komunitas');
            $table->foreign('dataDiriId')->references('dataDiriId')->on('datadiri');
            $table->foreign('userId')->references('userId')->on('users');
            $table->foreign('jabatanId')->references('jabatanId')->on('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
