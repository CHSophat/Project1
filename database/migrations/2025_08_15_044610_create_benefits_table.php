<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('benefits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->enum('benefit_type', ['insurance','loan','allowance','bonus','other']);
            $table->string('description', 255)->nullable();
            $table->decimal('amount', 10, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->foreign('employee_id')
                  ->references('id')
                  ->on('employees')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('benefits');
    }
};
