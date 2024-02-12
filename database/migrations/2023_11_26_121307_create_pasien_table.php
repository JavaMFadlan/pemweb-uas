<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->string('gender');
            $table->string('penyakit_khusus')->nullable();
            $table->decimal('berat_badan', 8, 2);
            $table->decimal('tinggi_badan', 8, 2);
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps(); // Created_at and Updated_at columns

            // You can add other specific constraints or indexes as needed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
