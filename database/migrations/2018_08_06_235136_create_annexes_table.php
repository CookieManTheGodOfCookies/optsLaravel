<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annexes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unique();
            $table->date('practice_start');
            $table->date('practice_end');
            $table->unsignedInteger('contract_id')->index();
            $table->unsignedInteger('practice_type_id')->index();
            $table->unsignedInteger('student_id')->index()->nullable();
            $table->timestamps();

            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->foreign('practice_type_id')->references('id')->on('practice_types');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annexes');
    }
}
