<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function questionnaire()
    {
        // a question belongto a questionnaire
       return $this->belongsTo(Questionnaire::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
