<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    protected $fillable = ['lesson_id', 'user_id'];
}
