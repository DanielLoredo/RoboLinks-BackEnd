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
            $table->boolean("GitHub")->default('0');
            $table->boolean("Social")->default('0');
            $table->boolean("@Home")->default('0');
            $table->boolean("VSSS")->default('0');
            $table->boolean("Sponsors")->default('0');
            $table->boolean("Documentation")->default('0');
            $table->boolean("Facebook")->default('0');
            $table->boolean("YouTube")->default('0');
            $table->boolean("ML")->default('0');
            $table->boolean("AI")->default('0');
            $table->boolean("Robotics")->default('0');
            $table->boolean("Mechanics")->default('0');
            $table->boolean("Candidates")->default('0');
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
