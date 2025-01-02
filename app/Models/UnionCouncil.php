<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnionCouncil extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tehsil_id'];

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
        return $this->belongsToMany(User::class, 'polio_worker_union_council', 'union_council_id', 'polio_worker_id');
    }
}
