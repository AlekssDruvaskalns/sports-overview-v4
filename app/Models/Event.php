<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date', 'location', 'organization_id'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function fights()
    {
        return $this->hasMany(Fight::class);
    }

    public function favoredBy()
    {
        return $this->belongsToMany(User::class, 'event_user')->withTimestamps();
    }

}



