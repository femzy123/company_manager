<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = array('first_name', 'last_name', 'company_id', 'email', 'phone');

    protected $hidden = [
        'company_id',
    ];

    public function company () {
        return $this->belongsTo('App\Company');
    }
}
