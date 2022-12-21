<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkCaseCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_case_categories', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(true);
            $table->boolean('is_top')->default(false);
            $table->string('title');
            $table->string('slug')->nullable();
            $table->bigInteger('rank')->default(0);
            $table->string('pic', 512)->nullable();
            $table->string('og_image', 512)->nullable();
            $table->string('meta_robots', 100)->nullable()->default('index, follow');
            $table->date('date_on')->nullable();
            $table->date('date_off')->nullable();
            $table->timestamps();
            $table->boolean('deletable')->default(true);
        });

        Schema::create('work_case_category', function (Blueprint $table) {
            $table->unsignedBigInteger('work_case_id')->index();
            $table->unsignedBigInteger('work_case_category_id')->index();
            $table->bigInteger('rank')->default(0);

            $table->primary(['work_case_id', 'work_case_category_id']);

            $table->foreign('work_case_id')->references('id')->on('work_cases')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('work_case_category_id')->references('id')->on('work_case_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_case_categories');
        Schema::dropIfExists('work_case_category');
    }
}
