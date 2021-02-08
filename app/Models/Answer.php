<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //Odgovor pripada jednom pitanju, jedno pitanje ima vise odgovora
    public function Question(){
        return $this->belongsTo('App\Models\Question');

    }
}
