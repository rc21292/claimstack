<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_statuses', function (Blueprint $table) {
            $table->id();
            $table->enum('assessment_status',['Yes','No'])->default('No');
            $table->enum('pre_assessment_status',['Yes','No'])->default('No');
            $table->double('pre_assessment_amount')->default(0);
            $table->enum('final_assessment_status',['Yes','No'])->default('No');
            $table->double('final_assessment_amount')->default(0);
            $table->double('assessment_amount')->default(0);
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
        Schema::dropIfExists('assessment_statuses');
    }
};
