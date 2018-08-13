<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function practice() {
        return $this->hasOne('App\Annex');
    }
}
