<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'info'];

    public function contracts () {
        return $this->hasMany('App\Contract');
    }
}
