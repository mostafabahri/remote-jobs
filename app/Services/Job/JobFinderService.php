<?php

namespace App\Services\Job;

use App\Job;

class JobFinderService
{
    public function all()
    {
        return Job::with('company')->latest()->paginate();
    }

    public function search($term)
    {
        if ($term) {
            return Job::with('company')->where('title', 'ilike', '%' . $term . '%')

            ->orWhereHas('company', function ($query) use ($term) {
                $query->where('name', 'ilike', '%' . $term . '%');
            })->latest()->paginate();
        }
        return $this->all();
    }
}
