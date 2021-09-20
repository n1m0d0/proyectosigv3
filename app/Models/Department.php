<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function people()
    {
        return $this->hasMany(Person::class);
    }

    public function branchs()
    {
        return $this->hasMany(Branch::class);
    }
}
