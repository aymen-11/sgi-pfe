<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('incident_id')->constrained('incidents')->onDelete('cascade');

            $table->date('scheduled_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            $table->text('work_description');
            $table->text('materials_used')->nullable();

            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'cancelled'])->default('scheduled');

            $table->timestamp('created_at')->useCurrent();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
