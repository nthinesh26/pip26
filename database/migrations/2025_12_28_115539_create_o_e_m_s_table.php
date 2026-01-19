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
        Schema::create('o_e_m_s', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('account_full_name');
            $table->string('account_email');
            $table->string('account_phone');
            $table->string('account_pwd');
            $table->string('company_name');
            $table->string('company_country');
            $table->string('company_registration_no');
            $table->integer('company_year_established');
            $table->string('company_type');
            $table->string('oem_address1');
            $table->string('oem_address2');
            $table->string('oem_postcode');
            $table->string('oem_city');
            $table->string('oem_country');
            $table->string('company_website');
            $table->string('ack_name');
            $table->string('ack_position');
            $table->date('ack_date');
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
        Schema::dropIfExists('o_e_m_s');
    }
};