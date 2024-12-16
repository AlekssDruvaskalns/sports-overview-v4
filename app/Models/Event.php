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
}



