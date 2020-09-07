<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'task_id');
    }
}
