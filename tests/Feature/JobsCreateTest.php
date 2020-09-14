<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class JobsCreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_create_job_page()
    {
        $response = $this->get(route('jobs.create'));

        $response->assertSuccessful();
    }

    public function validInputProvider()
    {
        return [
            'all data with logo' => [
                [
                    'title' => 'senior developer',
                    'region' => 'Full time',
                    'instructions' => 'company.co/apply',
                    'description' => 'jt co we are looking for lorem ipsum',
                ],
                [
                    'name' => 'myCompany',
                    'location' => 'Chicago',
                    'logo' => UploadedFile::fake()->image('myLogo.jpg'),
                ],
            ],
            'all data without logo' => [
                [
                    'title' => 'senior developer 2',
                    'region' => 'Part time',
                    'instructions' => 'company.co/apply',
                    'description' => 'jt co we are looking for lorem ipsum',
                ],
                [
                    'name' => 'myCompany',
                    'location' => 'London',
                ],
            ],
        ];
    }

    /**
     * @dataProvider validInputProvider
     */
    public function test_store_valid_job_create_request($job, $company)
    {
        $this->withoutExceptionHandling();

        Storage::fake();

        $this->post(route('jobs.store'), compact('job', 'company'))
            ->assertSuccessful()
            ->assertSessionHasNoErrors();

        // handle logo storage
        if (isset($company['logo'])) {
            Storage::assertExists($company['logo'] = $company['logo']->hashName('logos'));
        }

        $this->assertDatabaseHas('jobs', $job);
        $this->assertDatabaseHas('companies', $company);
    }

    public function invalidInputProvider()
    {
        return [
            'incomplete job' => [
                ['title' => 'incomplete fields'],
                [],
            ],
            'incomplete company' => [
                [
                    'title' => 'senior developer',
                    'region' => 'Full time',
                    'instructions' => 'company.co/apply',
                    'description' => 'at co we are looking for lorem ipsum',
                ],
                ['logo' => UploadedFile::fake()->image('test.jpg')],
            ],
        ];
    }

    /**
     * @dataProvider invalidInputProvider
     */
    public function test_return_errors_for_invalid_job_create_request($job, $company)
    {
        $this->post(route('jobs.store'), compact('job', 'company'))->assertSessionHasErrors();
    }
}
