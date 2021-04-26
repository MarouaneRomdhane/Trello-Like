<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function table()
    {
        return $this->hasMany('App\Models\Table');
    }
    public function column()
    {
        return $this->hasMany('App\Models\Column');
    }
}
