<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public function official()
    {
        return $this->belongsTo(Official::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
