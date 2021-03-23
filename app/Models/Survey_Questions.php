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
    protected $fillable = [
        "SurveyName",
        "ConditionServed",
        "SurveyType",
        "SurveyQuestions"
    ];

    
    public $incrementing = false;
    public $timestamps = false;
}
