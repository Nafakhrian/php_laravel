<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_bar');
            $table->integer('id_rua')->unsigned();
            $table->string('nama_bar', 100);
            $table->integer('total_bar');
            $table->integer('rusak_bar');
            $table->string('foto', 100)->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->timestamps();

            $table->foreign('id_rua')->references('id_rua')->on('ruangan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('created_by')->references('id')->on('user')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('updated_by')->references('id')->on('user')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
