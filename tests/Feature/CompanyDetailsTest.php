<?php

namespace Tests\Feature;

use App\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyDetailsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_company_details_page()
    {
        $company = factory(Company::class)->create();

        $this->get(route('companies.show', $company->id))->assertOk()
            ->assertViewHas('company');
    }
}
