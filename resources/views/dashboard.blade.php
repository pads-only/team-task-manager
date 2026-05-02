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
    <div class="grid md:grid-cols-3 gap-4 mb-8 border-b border-border py-4">
        <div class="border border-border p-4 rounded-lg text-center">
            <p class="text-sm text-text">Teams</p>
            <h2 class="text-2xl font-semibold text-secondary">
                {{ $teams->count() }}
            </h2>
        </div>

        <div class="border border-border p-4 rounded-lg text-center">
            <p class="text-sm text-text">Projects</p>
            <h2 class="text-2xl font-semibold text-secondary">
                {{ $projects->count() }}
            </h2>
        </div>

        <div class="border border-border p-4 rounded-lg text-center">
            <p class="text-sm text-text">My Tasks</p>
            <h2 class="text-2xl font-semibold text-secondary">
                {{ $tasks->count()}}
            </h2>
        </div>
    </div>

    <!-- My Tasks -->
    <div class="mb-8 border-b border-border py-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-secondary">
                My Tasks
            </h2>
        </div>

        <div class="space-y-3">
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
        </div>
    </div>

    <!-- Teams + Projects -->
    <div class="grid md:grid-cols-2 gap-6 mb-8 border-b border-border py-4">

        <!-- Teams -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-secondary">
                    Teams
                </h2>

                <a href="{{ route('team.create') }}" class="inline-flex items-center gap-2 rounded-md bg-primary px-4 py-2 text-sm font-medium text-white transition hover:opacity-90">
                    Create
                </a>
            </div>

            <div class="space-y-3">
                @forelse ($teams as $team)
                    <x-card class="flex justify-between items-center">
                        <span class="text-sm text-secondary">
                            {{ $team->name }}
                        </span>

                        <a href="{{ route('team.show', $team->slug) }}" class="inline-flex items-center gap-2 rounded-md bg-primary px-4 py-2 text-sm font-medium text-white transition hover:opacity-90" variant="outline">
                            View
                        </a>
                    </x-card>
                @empty
                    <p class="text-sm text-text">No teams yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Projects -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-secondary">
                    Projects
                </h2>
            </div>

            <div class="space-y-3">
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
            </div>
        </div>

    </div>

    <!-- Invitations -->
    @if ($invitations->count())
        <div>
            <h2 class="text-lg font-semibold text-secondary mb-4">
                Invitations ({{$invitations->count()}})
            </h2>

            <div class="space-y-3">
                @foreach ($invitations as $invite)
                    <div class="flex justify-between items-center lg:max-w-xl border border-border p-4 rounded-lg bg-white">
                        <span class="text-sm text-secondary font-semibold capitalize">
                            {{ $invite->team->name }} ({{$invite->team->owner->name}})
                        </span>

                        <div class="flex gap-2">
                            <form action="{{ route('invitation.attach', $invite->token) }}" method="POST">
                                @csrf
                                <x-primary-button>Accept</x-primary-button>
                            </form>

                            <x-danger-button variant="outline">
                                Decline
                            </x-danger-button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</x-app-layout>