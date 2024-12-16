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
        'sport_attributes',
    ];

    protected $casts = [
        'sport_attributes' => 'array', //turn json to array
        'date_of_birth' => 'date',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}