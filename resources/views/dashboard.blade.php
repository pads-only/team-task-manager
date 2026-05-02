{{-- <x-app-layout>

    <h1>hello nigga</h1>
    
    <a href="{{ route('team.create') }}">Create team</a>
    <br>
    <a href="{{ route('team.index') }}">My team</a>
    <br>
    <a href="{{ route('invitaion.index') }}">See invitations</a>

    <x-primary-button>primary</x-primary-button>
    <x-secondary-button>secondary</x-secondary-button>
</x-app-layout> --}}

<x-app-layout>

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-secondary">
            Dashboard
        </h1>
        <p class="text-sm text-text">
            Welcome back, {{ Auth::user()->name }}
        </p>
    </div>

    <!-- Stats -->
    <div class="grid md:grid-cols-3 gap-4 mb-8">
        <x-card>
            <a href="{{ route('invitaion.index') }}">See invitations</a>
            <p class="text-sm text-text">Teams</p>
            <h2 class="text-2xl font-semibold text-secondary">
                {{-- {{ $teamsCount }} --}}
            </h2>
        </x-card>

        <x-card>
            <p class="text-sm text-text">Projects</p>
            <h2 class="text-2xl font-semibold text-secondary">
                {{-- {{ $projectsCount }} --}}
            </h2>
        </x-card>

        <x-card>
            <p class="text-sm text-text">My Tasks</p>
            <h2 class="text-2xl font-semibold text-secondary">
                {{-- {{ $tasksCount }} --}}
            </h2>
        </x-card>
    </div>

    <!-- My Tasks -->
    <div class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-secondary">
                My Tasks
            </h2>
        </div>

        {{-- <div class="space-y-3">
            @forelse ($tasks as $task)
                <x-card class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-secondary">
                            {{ $task->title }}
                        </p>
                        <p class="text-xs text-text">
                            {{ $task->project->name }}
                        </p>
                    </div>

                    <span class="text-xs text-text">
                        {{ ucfirst($task->status) }}
                    </span>
                </x-card>
            @empty
                <p class="text-sm text-text">No tasks assigned.</p>
            @endforelse
        </div> --}}
    </div>

    <!-- Teams + Projects -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">

        <!-- Teams -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-secondary">
                    Teams
                </h2>

                <x-primary-button>
                    Create
                </x-primary-button>
            </div>

            <div class="space-y-3">
                {{-- @forelse ($teams as $team) --}}
                    <x-card class="flex justify-between items-center">
                        <span class="text-sm text-secondary">
                            {{-- {{ $team->name }} --}}
                        </span>

                        <x-secondary-button variant="outline">
                            View
                        </x-secondary-button>
                    </x-card>
                {{-- @empty --}}
                    <p class="text-sm text-text">No teams yet.</p>
                {{-- @endforelse --}}
            </div>
        </div>

        <!-- Projects -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-secondary">
                    Projects
                </h2>
            </div>

            {{-- <div class="space-y-3">
                @forelse ($projects as $project)
                    <x-card>
                        <p class="text-sm text-secondary">
                            {{ $project->name }}
                        </p>
                        <p class="text-xs text-text">
                            {{ $project->team->name }}
                        </p>
                    </x-card>
                @empty
                    <p class="text-sm text-text">No projects yet.</p>
                @endforelse
            </div> --}}
        </div>

    </div>

    <!-- Invitations -->
    {{-- @if ($invitations->count())
        <div>
            <h2 class="text-lg font-semibold text-secondary mb-4">
                Invitations
            </h2>

            <div class="space-y-3">
                @foreach ($invitations as $invite)
                    <x-card class="flex justify-between items-center">
                        <span class="text-sm text-secondary">
                            {{ $invite->team->name }}
                        </span>

                        <div class="flex gap-2">
                            <x-primary-button>
                                Accept
                            </x-primary-button>

                            <x-primary-button variant="outline">
                                Decline
                            </x-primary-button>
                        </div>
                    </x-card>
                @endforeach
            </div>
        </div>
    @endif --}}

</x-app-layout>