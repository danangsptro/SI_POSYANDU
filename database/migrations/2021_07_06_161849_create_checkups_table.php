<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nama_vitamin')->unsigned();
            $table->bigInteger('nama_imunisasi')->unsigned();
            $table->bigInteger('id_balita')->unsigned();
            $table->string('berat_balita');
            $table->date('tanggal_imunisasi');
            $table->timestamps();

            $table->foreign('nama_vitamin')->references('id')->on('jenis_vitamins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nama_imunisasi')->references('id')->on('jenis_imunisasis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_balita')->references('id')->on('balitas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkups');
    }
}
