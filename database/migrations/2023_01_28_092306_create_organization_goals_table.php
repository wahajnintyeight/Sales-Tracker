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
            $table->date("goal_start_date");
            $table->date("deadline");
            $table->integer("is_completed")->default(0);
            $table->integer("k_p_i_id");
            $table->integer("calls");
            $table->integer("fixed_apt")->default(0);
            $table->integer("pitches")->default(0);
            $table->integer("organizations_reached");
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