<?php

namespace App;

class JobFinder
{
    public function find()
    {
        return Job::with('company')->latest()->paginate();
    }
}
