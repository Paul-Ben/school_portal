<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function faculty():BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }
    public function department():BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    
}
