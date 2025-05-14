<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sport_id'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
