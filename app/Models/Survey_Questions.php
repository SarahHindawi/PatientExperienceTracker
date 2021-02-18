<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey_Questions extends Model
{
    use HasFactory;

    protected $table = 'SURVEY_QUESTIONS';
    protected $primaryKey = 'SurveyName';
    protected $keyType = 'string';   
    public $incrementing = false;
    public $timestamps = false;
}
