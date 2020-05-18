<?php

namespace App;

class JobFinder
{
    public function find()
    {
        return Job::latest()->paginate();
    }
}
