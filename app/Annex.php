<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annex extends Model
{
    protected $fillable = ['number', 'practice_start', 'practice_end'];

    public function contract() {
        return $this->belongsTo('App\Contract');
    }

    public function student() {
        return $this->belongsTo('App\Student');
    }
}
