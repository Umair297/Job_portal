<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'role',
        'country',
        'city',
        'about_job',
        'requirement',
        'experience',
        'job_type',
        'user_id',
        'salary',
        'category',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
public function company()
{
    return $this->belongsTo(Company::class);
}


public function applications()
{
    return $this->hasMany(JobApplication::class);
}

}
