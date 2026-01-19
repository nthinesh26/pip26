<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('i_c_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('type'); //local, oem,
            $table->integer('company_id');
            $table->string('ctg');
            $table->string('name');
            $table->string('contract');
            $table->integer('start_year');
            $table->integer('end_year');
            $table->text('props')->nullable();
            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_c_p_s');
    }
};