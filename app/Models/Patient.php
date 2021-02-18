<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'PATIENT_PROFILE';
    protected $primaryKey = 'Email';
    protected $keyType = 'string';
    protected $hidden = ['Password'];
    public $incrementing = false;
    public $timestamps = false;
}
