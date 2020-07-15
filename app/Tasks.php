<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
     'title',
     'description',
     'project_id',
     'status_id',
    ];
}
