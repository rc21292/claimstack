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
        Schema::create('icd_codes', function (Blueprint $table) {
            $table->id();
            $table->string('level4_code')->nullable;
            $table->string('level3_code')->nullable;
            $table->string('level2_code')->nullable;
            $table->string('level1_code')->nullable;
            $table->string('level4')->nullable;
            $table->string('level3')->nullable;
            $table->string('level2')->nullable;
            $table->string('level1')->nullable;
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
        Schema::dropIfExists('icd_codes');
    }
};
