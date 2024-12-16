<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{

    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'nationality',
        'height',
        'sport_id',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}