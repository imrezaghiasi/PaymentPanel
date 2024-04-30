<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\DocBlock\Tag;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->references('id')->on('payment_requests')->cascadeOnDelete();
            $table->text('description_of_reject')->nullable();
            $table->integer('status')->default(2); //2 means waiting... 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_statuses');
    }
};
