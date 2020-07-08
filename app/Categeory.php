<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categeory extends Model
{
    public function blog(){
        return $this->hasMany(Blog::class);
    }
}
