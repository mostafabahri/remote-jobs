@props(['jobs'])
<ul class="space-y-3">
    @foreach ($jobs as $job)
    <li>
        <x-job-item :job="$job" />
    </li>
    @endforeach
</ul>