@props(['size' => 'md'])
<a {{$attributes->merge([
   'class' => 'inline-block bg-red-600 text-white hover:shadow-lg font-medium ' . ($size === 'sm' ? 'px-5 py-2 text-sm' : 'px-8 py-3'),
    'href' => '#'
]) }}>
    {{$slot}}
</a>