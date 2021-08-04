<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('users', function (Blueprint $table) {
            $table->string('userId',15)->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->primary('userId');
        });
        
        Schema::create('datadiri', function (Blueprint $table) {
            $table->id('dataDiriId');//Primary key
            $table->string('email');
            $table->string('nama');
            $table->string('fakultas');
            $table->string('noTelp',15);
            $table->string('jenisKelamin',10);
            $table->string('domisili');
            $table->string('foto')->nullable();
            $table->string('ig')->nullable();
            $table->string('wa')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('line')->nullable();
            $table->string('userId')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

        });
        
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id('komunitasId');//Primary key
            $table->string('nama');
            $table->string('alamat');
            $table->string('jenis');
            $table->text('deskripsi');
            $table->string('logo')->nullable();
            $table->string('ketuaId')->nullable();
            $table->string('email')->nullable();
            $table->string('line')->nullable();
            $table->string('ig')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
        
        Schema::create('divisi', function (Blueprint $table) {
            $table->string('divisiId');
            $table->string('nama');
            $table->unsignedBigInteger('komunitasId');
            $table->string('ketuaId');
            $table->string('deskripsi');
            $table->string('logo')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

            $table->primary('divisiId');
        });
        
        Schema::create('proker', function (Blueprint $table) {
            $table->string('prokerId');
            $table->string('nama');
            $table->date('tglProker');
            $table->unsignedBigInteger('komunitasId');
            $table->text('deskripsi');
            $table->string('divisiId')->nullable();
            $table->string('logo')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

            $table->primary('prokerId');
        });
        
        Schema::create('anggota', function (Blueprint $table) {
            $table->string('anggotaId')->unique();
            $table->unsignedBigInteger('jabatanId');
            $table->unsignedBigInteger('komunitasId');
            $table->boolean('statusacc')->default(0);
            $table->string('divisiId')->nullable();
            $table->unsignedBigInteger('dataDiriId')->nullable();
            $table->string('userId')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();

            $table->primary('anggotaId');
        });

        Schema::create('jabatan',function(Blueprint $table){
            $table->id('jabatanId');//Primary key
            $table->string('nama');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('komunitas');
        Schema::dropIfExists('datadiri');
        Schema::dropIfExists('socialMedia');
        Schema::dropIfExists('anggota');
        Schema::dropIfExists('divisi');
        Schema::dropIfExists('proker');
        Schema::dropIfExists('jabatan');
    }
}
