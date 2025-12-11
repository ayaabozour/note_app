<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
    'title',
    'desc',
    'is_checked',
    'user_id',
];

public function subNotes(){
    return $this->hasMany(\App\Models\SubNote::class);
}

public function user(){
    return $this->belongsTo(\App\Models\Users::class);
}
}
