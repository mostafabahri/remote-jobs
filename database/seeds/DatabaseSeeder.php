<?php

use App\Company;
use App\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Company::class)->times(10)->create()->each(
            function (Company $company) {
                // Seed the company with some jobs
                $jobs = factory(Job::class)->times(mt_rand(1, 3))->make();
                $company->jobs()->saveMany($jobs);
            }
        );
    }
}
