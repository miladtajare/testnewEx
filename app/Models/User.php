<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userName',
        'email',
        'password',
        'firstName',
        'lastName',
        'nationalCode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_icon($user_type)
    {
        if($user_type == 'teacher'){return 'استاد';}
        if($user_type == 'student'){return 'دانشجو';}
        if($user_type == 'manager'){return 'مدیر';}
        if($user_type == 'guest'){return 'مهمان';}
        return 'هیچ!';
    }

    public function class()
    {
        return $this->belongsToMany(ClassRoom::class, 'class_user', 'student_id', 'class_room_id');
    }

    public function score()
    {
        return $this->hasMany(Score::class, 'student_id', 'id');
    }

    public function user_class_register($class)
    {
        $class = $class::whereHas('students', function($q) {
           dd($q->get());
            //$q->whereIn('id', [1] );
        });

    }

}
