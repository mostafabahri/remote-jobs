<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasLogo;

    protected $fillable = [
        'name',
        'logo',
        'location',
        'website',
        'description',
        'statement',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
