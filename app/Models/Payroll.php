<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'payroll';

    protected $fillable = [
        'employee_id',
        'month',
        'salary',
        'bonuses',
        'deductions',
        'paid_date',
    ];

    public $timestamps = false;

    // Relationship to Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
