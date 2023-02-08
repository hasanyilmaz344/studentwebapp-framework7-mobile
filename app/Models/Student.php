<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{

    protected $fillable = [
        'fname',
        'lname',
        'snumber',
        'department',
        'age'
    ];
    protected $hidden =[
        'user_id'
    ];
    
 
}
