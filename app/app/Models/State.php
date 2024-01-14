<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function localGovernmentAreas()
    {
        return $this->hasMany(LocalGovernmentArea::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
