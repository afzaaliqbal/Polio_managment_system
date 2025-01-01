<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;

    public function unionCouncil()
    {
        return $this->belongsTo(UnionCouncil::class);
    }

    public function householdMembers()
    {
        return $this->hasMany(HouseholdMember::class);
    }
}
