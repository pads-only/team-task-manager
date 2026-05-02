@props([
    'padding' => 'p-6'
])

<div {{ $attributes->merge([
    'class' => "max-w-3xl mx-auto bg-white p-4 rounded-lg shadow-md"
]) }}>
    {{ $slot }}
</div>