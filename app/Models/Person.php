<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function decendants()
    {
        return $this->hasMany(Decendant::class);
    }

    public function problems()
    {
        return $this->belongsToMany(Problem::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function careers()
    {
        return $this->belongsToMany(Career::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function abilities()
    {
        return $this->hasMany(Ability::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
