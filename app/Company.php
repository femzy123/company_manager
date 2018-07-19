<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = array('name', 'email', 'website');

    public function employees () {
        return $this->hasMany('App\Employee');
    }
}
