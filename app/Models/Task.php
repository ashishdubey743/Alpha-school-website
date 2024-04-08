<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'taskname',
        'subject',
        'duedate',
        'assigned',
        'room',
        'status',
        'created_at',
        'updated_at'
    ];
}
