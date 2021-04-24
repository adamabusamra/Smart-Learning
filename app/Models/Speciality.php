<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'field_id'];

    // Defining one to many relationship with [Field]
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
