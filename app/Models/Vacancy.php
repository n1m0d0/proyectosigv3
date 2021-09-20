<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function career()
    {
        return $this->belongsTo(Career::class);
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
