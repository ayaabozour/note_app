<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Users extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function notes(){
       return $this->hasMany(\App\Models\Users::class);
    }
}
