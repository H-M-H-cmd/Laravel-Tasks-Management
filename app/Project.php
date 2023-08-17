<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;
class Project extends Model
{
    public function tasks() 
    {
        return $this->hasMany(Task::class);
    }
}
