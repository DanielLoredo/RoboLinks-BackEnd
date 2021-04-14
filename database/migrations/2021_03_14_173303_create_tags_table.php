<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("link_id");
            $table->boolean("@home")->default('0');
            $table->boolean("candidates")->default('0');
            $table->boolean("contests")->default('0');
            $table->boolean("covid")->default('0');
            $table->boolean("docs")->default('0');
            $table->boolean("drones")->default('0');
            $table->boolean("electronics")->default('0');
            $table->boolean("github")->default('0');
            $table->boolean("larcOpen")->default('0');
            $table->boolean("mechanics")->default('0');
            $table->boolean("presentation")->default('0');
            $table->boolean("programming")->default('0');
            $table->boolean("robocup")->default('0');
            $table->boolean("sideProjects")->default('0');
            $table->boolean("social")->default('0');
            $table->boolean("sponsors")->default('0');
            $table->boolean("vsss")->default('0');
            $table->boolean("youtube")->default('0');
            $table->boolean("workshop")->default('0');
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
        Schema::dropIfExists('tags');
    }
}
