<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'student';

    protected $guarded = [];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
    // public function submitProjects()
    // {
    //     return $this->hasMany(SubmitProject::class);
    // }
}
