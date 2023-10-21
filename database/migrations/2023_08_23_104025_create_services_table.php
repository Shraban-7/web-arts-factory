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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name')->unique();
            $table->string('service_slug')->unique();
            $table->string('meta_title')->nullable();
            $table->string('meta_tag')->nullable();
            $table->longText('meta_desc')->nullable();
            $table->string('service_logo')->nullable();
            $table->longText('service_desc')->nullable();
            $table->longText('service_process')->nullable();
            $table->longText('service_benefits')->nullable();
            $table->string('service_duration')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
