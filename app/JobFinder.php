<?php

namespace App;

class JobFinder
{
    public static function all()
    {
        return Job::with('company')->latest()->paginate();
    }

    public static function search($term)
    {
        if ($term) {
            return Job::with('company')->where('title', 'ilike', '%' . $term . '%')

            ->orWhereHas('company', function ($query) use ($term) {
                $query->where('name', 'ilike', '%' . $term . '%');
            })->latest()->paginate();
        }
        return self::all();
    }
}
