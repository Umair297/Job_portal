<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact',
        'website',
        'summary',
        'role',
        'work_experience',
        'education',
        'additional_info',
    ];
}
