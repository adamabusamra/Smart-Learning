<?php

namespace App\Models;

use Carbon\Carbon;
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
    public function isOverDue($end)
    {
        $end = Carbon::parse($end);
        $current = Carbon::now();
        $length = $current->gt($end);
        // if ($length) {
        //     return true;
        // } else {
        //     return false;
        // }
        return $length;
    }
    public function progress($start, $end)
    {
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);
        $current = Carbon::now();
        $initialLength = $start->diffInMinutes($end);
        $currentLength = $current->diffInMinutes($end);
        $progress = $currentLength / $initialLength;
        if ($current->gt($end)) {
            return 100;
        } else if ($current->gt($start) && !$current->gt($end)) {
            return 100 - round($progress * 100);
        } else {
            return 0;
        }
    }
}
