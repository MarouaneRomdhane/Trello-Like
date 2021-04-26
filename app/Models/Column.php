<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function table()
    {
        return $this->belongsTo('App\Models\Table');
    }
}
