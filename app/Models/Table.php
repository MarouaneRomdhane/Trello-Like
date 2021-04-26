<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function column()
    {
        return $this->hasMany('App\Models\Column');
    }
}
