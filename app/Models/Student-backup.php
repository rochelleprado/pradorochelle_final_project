<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
    #[Fillable([
        'first_name',
        'last_name',
        'email',
        'student_numbers',
        'year_level',
        'course'
    ])]
class Student extends Model
{

    
}
