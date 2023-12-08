<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    protected $fillable = [
        'course_name', 'description', 'start_at', 'end_at', 'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function content() {
        return $this->hasMany(Content::class);
    }
    public function registered_course() {
        return $this->hasMany(RegisteredCourse::class);
    }
}
