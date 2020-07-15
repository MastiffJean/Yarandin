<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_Status extends Model
{
    protected $fillable = [
     'title',
    ];

    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }
}
