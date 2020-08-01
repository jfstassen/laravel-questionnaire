<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded = [];

    // a questionnaire belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // a questionnaire has many question
    public function questions()
    {

        return $this->hasMany(Question::class);
    }
    // a questionnaire has many surveys
    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }
}
