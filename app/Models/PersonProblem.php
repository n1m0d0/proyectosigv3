<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonProblem extends Model
{
    use HasFactory;

    protected $table = "person_problem";

    //Relacion uno a muchos inversa

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function problem(){
        return $this->belongsTo(Problem::class);
    }
}
