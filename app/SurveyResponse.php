<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $guarded = [];

    // My survey response belong to a survey
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
