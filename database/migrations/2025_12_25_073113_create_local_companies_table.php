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
        Schema::create('local_companies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('company_name');
            $table->date('company_established');
            $table->string('company_ssm');
            $table->string('company_website');
            $table->string('company_type');
            $table->string('companygroup_type');
            $table->string('eperolehannumber');
            $table->string('company_address')->nullable();
            $table->string('companyfacility_address')->nullable();
            $table->string('companystatus_bumi')->nullable();
            $table->string('companystatus_nonbumi')->nullable();
            $table->string('companystatus_women')->nullable();
            $table->string('companystatus_jvforeign')->nullable();
            $table->string('name_ack')->nullable();
            $table->string('name_jobposition')->nullable();
            $table->string('ack_date')->nullable();
            $table->string('pdpa_ack')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_companies');
    }
};