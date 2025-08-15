<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_name', 100);
            $table->string('serial_number', 100)->unique()->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->date('assigned_date')->nullable();
            $table->date('return_date')->nullable();
            $table->enum('status', ['assigned','available','maintenance','retired'])->default('available');

            $table->foreign('assigned_to')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
