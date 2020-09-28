<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'description', 'region', 'instructions'];

    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function setCompanyAttribute(Company $company)
    {
        $this->company_id = $company->getKey();
    }

    public function loadDetails()
    {
        // load how many jobs related company has
        return $this->load([
            'company' => function ($query) {$query->withCount('jobs');},
        ]);
    }
}
