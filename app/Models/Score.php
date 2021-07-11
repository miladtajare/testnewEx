<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable =
    [		
        'score_number',
        'class_room_id',
        'student_id',
    ];


    
    public function student()
    {
        return $this->belongsTo(student::class, 'id', 'student_id');
    }


}
