<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{

    protected $fillable = [
        'event_id',
        'fighter_one',
        'fighter_two',
        'weight_class',
        'order',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
