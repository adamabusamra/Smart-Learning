<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'project_subject');
    }
    public function competencies()
    {
        return $this->belongsToMany(Competency::class);
    }
}
