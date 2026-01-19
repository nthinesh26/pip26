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
        Schema::create('royals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('agensi_name');
            $table->string('jenis_agensi');
            $table->string('atm_branch');
            $table->string('atm_pasukan_nyatakan');
            $table->string('lain_nyatakan');
            $table->string('kementerian');
            $table->string('agensi_address1');
            $table->string('agensi_address2');
            $table->string('postcode');
            $table->string('city');
            $table->string('state');
            $table->string('agensifacility_address1');
            $table->string('agensifacility_address2');
            $table->string('agensifacility_postcode');
            $table->string('agensifacility_city');
            $table->string('agensifacility_state');
            $table->string('name_ack');
            $table->string('name_jobposition');
            $table->string('ack_date');
            $table->string('pdpa_ack');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('royals');
    }
};