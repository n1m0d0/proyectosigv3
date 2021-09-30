<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    public function petition()
    {
        return $this->belongsTo(Petition::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
