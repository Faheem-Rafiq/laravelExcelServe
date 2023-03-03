<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    use HasFactory;

    public function people()
    {
        return $this->belongsTo('App\Models\Person', 'cnic', 'cnic');
    }
}
