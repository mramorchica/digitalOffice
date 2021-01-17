<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->text('description');
            $table->text('requirements');
            $table->text('responsibilities');
            $table->text('our_offer');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('how_to_apply')->nullable();
            $table->foreignId('position_id')->nullable();
            $table->foreignId('department_id');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreignId('responsible_user_id')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
