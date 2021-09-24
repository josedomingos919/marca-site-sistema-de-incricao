<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'value',
        'data_start',
        'data_end',
        'max_subscribers',
        'archive',
    ];

    protected $table = 'courses';
}
