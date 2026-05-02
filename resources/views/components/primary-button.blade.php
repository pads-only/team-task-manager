<button 
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => '
            inline-flex items-center justify-center
            px-4 py-2
            bg-primary text-white
            text-sm font-medium
            rounded-md
            border border-transparent
            hover:bg-orange-600
            active:bg-orange-700
            focus:outline-none focus:ring-2 focus:ring-orange-300
            transition
        '
    ]) }}
>
    {{ $slot }}
</button>