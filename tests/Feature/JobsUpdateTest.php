<?php

namespace Tests\Feature;

use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\Fixture\JobFixture;
use Tests\TestCase;

class JobsUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_edit_job_page()
    {
        $this->get(
            route('jobs.edit', factory(Job::class)->create())
        )->assertSuccessful();
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
                    'location' => 'chicago',
                    'website' => 'https://company.co',
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
                    'website' => 'https://company.co',
                    'location' => 'chicago',
                ],
            ],
        ];
    }

    /**
     * @dataProvider validInputProvider
     */
    public function test_update_job_with_input($job, $company)
    {
        $this->withoutExceptionHandling();

        Storage::fake();

        $existing = factory(Job::class)->create();

        $this->put(route('jobs.update', $existing), compact('job', 'company'))
            ->assertSuccessful()
            ->assertSessionHasNoErrors();

        // handle logo storage
        if (isset($company['logo'])) {
            Storage::assertExists($company['logo'] = $company['logo']->hashName('logos'));
        }
        $this->assertDatabaseHas('jobs', $job);
        $this->assertDatabaseHas('companies', $company);
    }
}
