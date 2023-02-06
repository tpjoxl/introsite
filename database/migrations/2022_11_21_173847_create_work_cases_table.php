<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_cases', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->boolean('is_top')->default(0);
            $table->string('title');
            $table->string('desc', 512)->nullable();
            $table->longText('text')->nullable();
            $table->string('url', 512)->nullable();
            $table->string('pic', 512)->nullable();
            $table->bigInteger('rank')->default(0);
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
        Schema::dropIfExists('work_cases');
    }
}
