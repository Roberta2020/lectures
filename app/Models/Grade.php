<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;
    
    public $fillable = ['lecture_id', 'student_id', 'grade'];

    public function lecture(){
        return $this->belongsTo('App\Models\Lecture');
    }

    public function student(){
        return $this->belongsTo('App\Models\Student');
    }
}
