@props(['disabled' => false])

<input 
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => '
            w-full
            bg-white
            border border-border
            text-text
            text-sm
            rounded-md
            px-3 py-2
            shadow-sm
            placeholder-gray-400
            focus:outline-none
            focus:ring-2 focus:ring-orange-300 focus:border-primary
            disabled:opacity-50 disabled:cursor-not-allowed
            transition
        '
    ]) }}
>