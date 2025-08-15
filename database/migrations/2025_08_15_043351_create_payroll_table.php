<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->date('month'); // stores month & year
            $table->decimal('salary', 15, 2);       // Increased precision
            $table->decimal('bonuses', 15, 2)->default(0.00);
            $table->decimal('deductions', 15, 2)->default(0.00);

            // MySQL 5.7+ syntax for generated column
            $table->decimal('net_pay', 15, 2)
                  ->storedAs('salary + bonuses - deductions');

            $table->date('paid_date')->nullable();

            $table->foreign('employee_id')
                  ->references('id')->on('employees')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payroll');
    }
};
