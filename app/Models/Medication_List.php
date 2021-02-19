<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication_List extends Model
{
    use HasFactory;

    protected $table = 'MEDICATION_LIST';
    public $timestamps = false;
}
