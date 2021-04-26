<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    public $fillable = [
        'bg_file',
        'user_id',
        'page'
    ];
}
