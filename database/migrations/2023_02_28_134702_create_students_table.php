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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            
            $table->string('nis', 17)->unique();
            $table->string('name', 100);
            $table->string('kelas', 2);
            $table->integer('p1')->unsigned()->nullable()->default(0);
            $table->integer('p2')->unsigned()->nullable()->default(0);
            $table->integer('p3')->unsigned()->nullable()->default(0);
            $table->integer('p4')->unsigned()->nullable()->default(0);
            $table->integer('p5')->unsigned()->nullable()->default(0);
            $table->integer('total_poin')->default(0);
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
        Schema::dropIfExists('students');
    }
};
