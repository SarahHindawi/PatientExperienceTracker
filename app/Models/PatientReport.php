<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientReport extends Model
{
    use HasFactory;

    protected $table = 'Patient_Report';
    public $timestamps = false;

    protected $casts = [
        'cost' => 'float'
    ];

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'condition',
        'medication',
        'weight',
        'height'
    ];
}
