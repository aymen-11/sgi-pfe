<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('ticket_number')->unique();

            // Relations
            $table->foreignUuid('customer_id')->constrained('customers');
            $table->foreignUuid('created_by')->constrained('users');

            $table->string('title');
            $table->text('description');

            $table->enum('priority', ['low', 'medium', 'high', 'critical'])->default('medium');
            $table->enum('status', ['open', 'assigned', 'resolved_remote', 'pending_intervention', 'closed'])->default('open');

            $table->foreignUuid('assigned_to')->nullable()->constrained('users');
            $table->timestamp('assigned_at')->nullable();
            $table->text('resolution_notes')->nullable();
            $table->timestamp('resolved_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};