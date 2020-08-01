<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded = [];

    //helper
    public function path()
    {
        return url('/questionnaires/' . $this->id);
    }
    public function publicPath()
    {
        return url('/surveys/' . $this->id . '-' . Str::slug($this->title));
    }

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
