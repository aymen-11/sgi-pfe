<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('intervention_id')->constrained('interventions')->onDelete('cascade');
            $table->enum('signer_type', ['customer', 'consultant']);
            $table->foreignUuid('signer_id')->constrained('users');
            $table->text('signature_data');
            $table->timestamp('signed_at')->useCurrent();
            $table->ipAddress('ip_address')->nullable();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('signatures');
    }
};
