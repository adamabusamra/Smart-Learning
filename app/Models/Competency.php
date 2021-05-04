<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
    public function submitProjects()
    {
        return $this->belongsToMany(SubmitProject::class);
    }
    public function evaluatedProjects()
    {
        return $this->belongsToMany(ProjectEvaluation::class);
    }
}
