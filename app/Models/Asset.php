<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_name',
        'serial_number',
        'assigned_to',
        'assigned_date',
        'return_date',
        'status',
    ];

    public $timestamps = false;

    // Relationship to Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'assigned_to');
    }
}
