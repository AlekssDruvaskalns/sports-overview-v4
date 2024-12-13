<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = ['name'];

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    // public function athletes()
    // {
    //     return $this->hasMany(Athlete::class);
    // }
}
