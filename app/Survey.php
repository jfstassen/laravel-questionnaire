<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded = [];

    // My Survey belongs to a quetionnaire
    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }
    // a survey will have many survey responses
    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }

}
