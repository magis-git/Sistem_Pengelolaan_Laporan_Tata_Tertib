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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('violation_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->text('report_desc');
            $table->string('reporter_name',100);
            $table->string('student_name', 100);
            $table->string('student_kelas', 2);
            $table->integer('p1')->unsigned()->nullable();
            $table->integer('p2')->unsigned()->nullable();
            $table->integer('p3')->unsigned()->nullable();
            $table->integer('p4')->unsigned()->nullable();
            $table->integer('p5')->unsigned()->nullable();
            $table->integer('total_poin')->unsigned()->nullable()->default(0);
            $table->string('status_verify', 10)->default('pending');
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
        Schema::dropIfExists('reports');
    }
};
