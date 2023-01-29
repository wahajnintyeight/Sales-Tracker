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
            $table->integer("organization_goal_id");
            $table->integer("calls");
            $table->integer("user_id");
            $table->date("performed_on");
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
        Schema::dropIfExists('organization_entries');
    }
};