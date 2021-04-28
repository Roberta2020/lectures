<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    public $fillable = ['name', 'description'];

    public function students(){
        return $this->belongsToMany('App\Models\Student', 'grades');
    }

    public function grades(){
        return $this->hasMany('App\Models\Grade');
    }

}
