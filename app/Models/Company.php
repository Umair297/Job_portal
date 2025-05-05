<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'website',
        'phone',
        'address',
        'city',
        'country',
        'category',
        'industry',
        'employees',
        'description',
        'linkedin_url',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'services',
        'certifications',
        'awards',
        'registration_number',
        'logo',
    ];
public function user()
{
    return $this->belongsTo(User::class);
}

public function jobs()
{
    return $this->hasMany(Job::class);
}

}
