<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'description', 'due_date'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
