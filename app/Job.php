<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
