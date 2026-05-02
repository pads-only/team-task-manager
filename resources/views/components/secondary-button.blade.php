<button 
    {{ $attributes->merge([
        'type' => 'button',
        'class' => '
            inline-flex items-center justify-center
            px-4 py-2
            bg-transparent
            border border-primary
            text-primary
            text-sm font-medium
            rounded-md
            hover:bg-primary hover:text-white
            focus:outline-none focus:ring-2 focus:ring-orange-300
            disabled:opacity-25
            transition
        '
    ]) }}
>
    {{ $slot }}
</button>