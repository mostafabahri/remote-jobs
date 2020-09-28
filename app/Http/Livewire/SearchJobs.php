<?php

namespace App\Http\Livewire;

use App\Services\Job\JobFinderService;

use Livewire\Component;
use Livewire\WithPagination;

class SearchJobs extends Component
{
    use WithPagination;

    public $search;

    protected $updatesQueryString = [
        'search' => [ 'except' => '' ]];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }

    public function getJobsProperty()
    {
        return app(JobFinderService::class)->search($this->search);
    }

    public function render()
    {
        return view('livewire.search-jobs');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function paginationView()
    {
        return 'vendor.pagination.livewire';
    }
}
