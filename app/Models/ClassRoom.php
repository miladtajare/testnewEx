<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_class_room',
        'number_class_room',
        'description_lg_class_room',
        'description_sm_class_room',
        'time_class_room',
        'start_class_room',
        'end_class_room',
        'date_exam_class_room',
        'capacity_class_room',
        'courses_id',
        'teacher_id',
    ];
    
    public function course()
    {
        return $this->hasMany(Course::class, 'id', 'courses_id');
    }

    public function teacher()
    {
        return $this->hasOne(User::class, 'id', 'teacher_id');
    }



}
