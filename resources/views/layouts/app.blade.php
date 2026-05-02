<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'App') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-text font-sans">

<div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="hidden md:flex md:flex-col w-64 border-r border-border bg-white">

        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-border">
            <span class="text-lg font-semibold text-secondary">
                onlypads.dev
            </span>
        </div>

        <!-- Nav -->
        <nav class="flex-1 px-4 py-6 space-y-1 text-sm">

            <a href="{{ route('dashboard') }}"
               class="block px-3 py-2 rounded-md text-text hover:bg-gray-200 hover:text-secondary">
                Dashboard
            </a>

            <a href="{{ route('team.index') }}"
               class="block px-3 py-2 rounded-md text-text hover:bg-gray-200 hover:text-secondary">
                Teams
            </a>

            <a href="#"
               class="block px-3 py-2 rounded-md text-text hover:bg-gray-200 hover:text-secondary">
                Projects
            </a>

            <a href="#"
               class="block px-3 py-2 rounded-md text-text hover:bg-gray-200 hover:text-secondary">
                Tasks
            </a>

        </nav>

        <!-- User -->
        <div class="p-4 border-t border-border text-sm text-text">
            {{ Auth::user()->name }}
        </div>
    </aside>

    <!-- Mobile + Content -->
    <div x-data="{ open: false }" class="flex-1 flex flex-col">

        <!-- Topbar -->
        <header class="h-16 flex items-center justify-between px-4 md:px-6 border-b border-border bg-white">

            <!-- Left -->
            <div class="flex items-center gap-3">

                <!-- Mobile Menu -->
                <button @click="open = true"
                        class="md:hidden p-2 rounded-md border border-border text-text">
                    ☰
                </button>

                <span class="text-base font-medium text-secondary">
                    Dashboard
                </span>
            </div>

            <!-- Right -->
            <div class="flex items-center gap-4 text-sm text-text">
                <span>{{ Auth::user()->email }}</span>
            </div>
        </header>

        <!-- Mobile Sidebar -->
        <div 
            x-show="open"
            x-transition
            class="fixed inset-0 z-50 bg-black/30 md:hidden"
        >
            <div class="w-64 h-full bg-white border-r border-border p-4">

                <button @click="open = false" class="mb-4 text-text">
                    ✕
                </button>

                <nav class="space-y-1 text-sm">

                    <a href="{{ route('dashboard') }}"
                       class="block px-3 py-2 rounded-md hover:bg-gray-200">
                        Dashboard
                    </a>

                    <a href="{{ route('team.index') }}"
                       class="block px-3 py-2 rounded-md hover:bg-gray-200">
                        Teams
                    </a>

                    <a href="#"
                       class="block px-3 py-2 rounded-md hover:bg-gray-200">
                        Projects
                    </a>

                    <a href="#"
                       class="block px-3 py-2 rounded-md hover:bg-gray-200">
                        Tasks
                    </a>

                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <main class="flex-1 px-4 md:px-8 py-8 max-w-6xl w-full mx-auto">
            {{ $slot ?? '' }}
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>