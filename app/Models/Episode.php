<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id',
        'title',
        'content',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
