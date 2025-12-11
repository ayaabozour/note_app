<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $fillable = [
    'note_id',
    'user_id',
    'content',
   ];

   public function note(){
    return $this->belongsTo(\App\Models\Note::class);
   }

   public function user(){
    return $this->belongsTo(\App\Models\Users::class);
   }
}
