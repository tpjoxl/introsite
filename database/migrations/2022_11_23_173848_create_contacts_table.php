<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(true);
            $table->boolean('is_top')->default(false);
            $table->string('name');
            $table->bigInteger('rank')->default(0);
            $table->string('email', 512)->nullable();
            $table->string('msg', 512)->nullable();
            $table->string('meta_robots', 100)->nullable()->default('index, follow');
            $table->timestamps();
            $table->boolean('deletable')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
