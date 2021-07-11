<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_course',
        'number_course',
        'description_lg_courses',
        'description_sm_courses',
    ];

   
    public function classrooms()
    {
        return $this->hasMany(ClassRoom::class, 'courses_id', 'id');
    }



}
