<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasLogo;

    protected $fillable = ['name', 'logo', 'location'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
