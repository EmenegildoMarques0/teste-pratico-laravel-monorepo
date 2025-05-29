<?php

namespace Modules\Task\Models;

use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Task\Database\Factories\TaskFactoryFactory;

// use Modules\Task\Database\Factories\TaskFactory;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'title', 'description', 'status'];

    // protected static function newFactory(): TaskFactory
    // {
    //     // return TaskFactory::new();
    // }

    protected static function newFactory()
{
    
    return TaskFactory::new();
}
}
