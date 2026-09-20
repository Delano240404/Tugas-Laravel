@props(['type' => 'aman'])

@php
    $colorClass = match($type) {
        'habis' => 'bg-red-100 text-red-800 border-red-200',
        'menipis' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
        default => 'bg-green-100 text-green-800 border-green-200',
    };
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border ' . $colorClass]) }}>
    {{ $slot }}
</span>