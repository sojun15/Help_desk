<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'application_id';

    protected $fillable = [
        'application_department',
        'supported_task',
        'task_status',
    ];
}
