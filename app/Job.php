<?php

namespace App;

use App\PublishedScope;
use Illuminate\Database\Eloquent\Model;

trait Publishable
{
    /**
     * boot the scope
     * @return void
     */
    protected static function bootPublishable()
    {
        static::addGlobalScope(new PublishedScope);
    }

    public function draft(): bool
    {
        return !$this->published;
    }

    public function publish()
    {
        $this->published = true;
        $this->save();
    }

    public static function findDraft($id): Job
    {
        return self::onlyDraft()->findOrFail($id);
    }
}

class Job extends Model
{
    use Publishable;

    protected $casts = [
        'published' => 'boolean'
    ];

    protected $fillable = ['title', 'description', 'region', 'instructions'];

    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function setCompanyAttribute(Company $company)
    {
        $this->company_id = $company->getKey();
    }

    public function loadDetails()
    {
        // load how many jobs related company has
        return $this->load([
            'company' => function ($query) {
                $query->withCount(['jobs' => function ($query) {
                    $query->withDraft();
                }]);
            },
        ]);
    }
}
