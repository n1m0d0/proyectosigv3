<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function replacement()
    {
        return $this->hasOne(Replacement::class);
    }
}
