<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers' , function (Blueprint $table){
            $table->uuid('id')->primary();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->string('company_name')->nullable();
            $table->text('address');
            $table->enum('preferred_contact_method' , ['email', 'phone', 'whatsapp'])->nullable();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
