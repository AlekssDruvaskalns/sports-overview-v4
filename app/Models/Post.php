<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'organization_id'];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
