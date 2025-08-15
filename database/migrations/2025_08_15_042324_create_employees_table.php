<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 150)->unique();
            $table->string('phone', 50)->nullable();
            $table->string('address', 255)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('hire_date');
            $table->string('job_title', 100)->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->enum('employment_status', ['active','terminated','resigned','on_leave'])->default('active');
            $table->timestamp('created_at')->useCurrent();

            // Foreign keys
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('set null');
            $table->foreign('manager_id')->references('id')->on('employees')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
