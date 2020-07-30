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
}
