<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnionCouncil extends Model
{
    use HasFactory;

    public function tehsil()
    {
        return $this->belongsTo(Tehsil::class);
    }

    public function households()
    {
        return $this->hasMany(Household::class);
    }

    public function polioWorkers()
    {
        // return $this->belongsToMany(Ps);
    }
}
