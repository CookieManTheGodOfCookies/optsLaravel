<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = ['number', 'date_of_contract', 'expiration_date'];

    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function annexes() {
        return $this->hasMany('App\Annex');
    }
}
