<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->singleton(\Faker\Generator::class, function ($app) {
                $faker = \Faker\Factory::create();

                // use picsum.photos for fake images
                $faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
                return $faker;
            });
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
