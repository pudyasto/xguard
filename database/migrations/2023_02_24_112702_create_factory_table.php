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
        Schema::create('factory', function (Blueprint $table) {
            $table->string('uuid',50)->primary();
            
            $table->string('kode', 5)->unique();
            $table->string('kode_ref', 10)->unique();
            $table->string('nama');
            $table->string('keterangan')->nullable();

            $table->text('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->text('lat_long')->nullable();

            $table->string('is_active')->default('Aktif');

            $table->string('created_by', 50)->nullable();
            $table->foreign('created_by')->references('uuid')->on('users');

            $table->string('updated_by', 50)->nullable();
            $table->foreign('updated_by')->references('uuid')->on('users');
            ;

            $table->string('deleted_by', 50)->nullable();
            $table->foreign('deleted_by')->references('uuid')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factory');
    }
};
