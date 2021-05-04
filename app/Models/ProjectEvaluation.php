<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEvaluation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function competencies()
    {
        return $this->belongsToMany(Competency::class, 'project_evaluation_competency')->withPivot('status');
    }
}
