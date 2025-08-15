<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'benefit_type',
        'description',
        'amount',
        'start_date',
        'end_date',
    ];

    public $timestamps = false;

    // Relationship to Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
