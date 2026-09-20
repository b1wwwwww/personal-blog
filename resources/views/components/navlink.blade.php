@props(['active' => false, 'href'])
@php
    $active = request()->url() == url($href);
    $base = 'rounded-md px-3 py-2 text-sm font-medium';
    $activeClass = 'bg-slate-800 text-white';
    $inactiveClass = 'text-gray-300 hover:bg-white/5 hover:text-white';
    $class = $active ? trim($base . ' ' . $activeClass) : trim($base . ' ' . $inactiveClass);
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $class]) }}>{{ $slot }}</a>
