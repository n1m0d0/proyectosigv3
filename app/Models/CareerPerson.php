<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerPerson extends Model
{
    use HasFactory;

    protected $table = "career_person";

    //Relacion uno a muchos inversa

    public function career(){
        return $this->belongsTo(Career::class);
    }

    public function person(){
        return $this->belongsTo(Person::class);
    }
}
