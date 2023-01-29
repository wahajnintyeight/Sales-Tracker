<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_goals', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("created_by");
            $table->longText("description");
            $table->integer("incentive");
            $table->date("deadline");
            $table->integer("kpi_id");
            $table->integer("calls");
            $table->integer("pitches");
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
        Schema::dropIfExists('organization_goals');
    }
};