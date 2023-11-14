<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riders extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'number',
        'name',
        'team',
        'konstruktor',
        'country',
        'tLahir',
        'description',
        '_token', 
    ];
    
}
