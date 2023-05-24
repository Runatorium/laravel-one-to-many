<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'thumb',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}