<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'review_date',
        'reviewer',
        'rating',
        'comments',
    ];

    public $timestamps = false;

    // Relationship to Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
