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
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('organisation_name');
            $table->string('organisation_established_date');
            $table->string('parent_ministry');
            $table->string('org_type_ministry');
            $table->string('org_type_armed_forces_unit');
            $table->string('org_type_academia_university');
            $table->string('org_type_research_institute');
            $table->string('org_type_professional_body');
            $table->string('akademia_address1');
            $table->string('akademia_address2');
            $table->string('akademia_postcode');
            $table->string('akademia_city');
            $table->string('akademia_state');
            $table->string('akademia_alt_address1');
            $table->string('akademia_alt_address2');
            $table->string('companyfacility_state');
            $table->string('organisation_website');
            $table->string('ack_name');
            $table->string('ack_position');
            $table->string('ack_date');
            $table->string('consent_pdpa');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutes');
    }
};