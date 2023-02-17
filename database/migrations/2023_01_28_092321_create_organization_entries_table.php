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
        Schema::create('organization_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("organization_goal_id");
            $table->foreign("organization_goal_id")->references('id')->on('organization_goals')->onDelete('cascade');
            $table->integer("calls")->default(0)->nullable();
            $table->integer("user_id");
            $table->date("performed_on");
            $table->integer("organizations_reached")->default(0)->nullable();
            $table->integer("fixed_apt")->default(0)->nullable();
            $table->integer("pitches")->default(0)->nullable();
            $table->integer("is_fup")->default(0);
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
        Schema::dropIfExists('organization_entries');
    }
};