<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Company;

class HasLogoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_stores_uploaded_logo_via_set_attribute()
    {
        Storage::fake();

        $logo = UploadedFile::fake()->image('myLogo.jpg');

        $company = factory(Company::class)->create(['logo' => $logo]);

        Storage::assertExists($logo->hashName($company->logoStoragePath));
    }


    /** @test */
    public function it_gets_storage_url_of_logo_if_has_logo()
    {
        Storage::fake();

        $logo = UploadedFile::fake()->image('myLogo.jpg');

        $company = factory(Company::class)->create(['logo' => $logo]);

        $this->assertEquals(Storage::url($logo->hashName($company->logoStoragePath)), $company->logo);
    }

    /** @test */
    public function it_gets_placeholder_image_url_for_logo_if_doesnt_have_logo()
    {
        $company = factory(Company::class)->create();

        $this->assertStringContainsString('picsum', $company->logo);
    }
}
