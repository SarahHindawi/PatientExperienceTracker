<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey_Responses extends Model
{
    use HasFactory;

    protected $fillable = [
        "Email",
        "DateCompleted",
        "SurveyName",
        "FirstName",
        "LastName",
        "Responses"
    ];


    protected $table = 'SURVEY_RESPONSES';
    public $timestamps = false;
}
