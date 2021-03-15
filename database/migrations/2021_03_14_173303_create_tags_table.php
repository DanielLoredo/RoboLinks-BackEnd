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
            $table->boolean("GitHub");
            $table->boolean("Social");
            $table->boolean("@Home");
            $table->boolean("VSSS");
            $table->boolean("Sponsors");
            $table->boolean("Documentation");
            $table->boolean("Facebook");
            $table->boolean("YouTube");
            $table->boolean("ML");
            $table->boolean("AI");
            $table->boolean("Robotics");
            $table->boolean("Mechanics");
            $table->boolean("Candidates");
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
