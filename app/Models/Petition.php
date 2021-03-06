<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    use HasFactory;

    public function forms()
    {
        return $this->hasMany(Form::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
