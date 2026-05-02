<x-app-layout>
    {{-- <x-card>
        <h1>{{$team->name}}</h1>
        <h4>Members</h4>
        <ul>           
            @foreach ($team->users as $member)
            <li>{{$member->name}} : ({{$member->pivot->role}})</li>
            @endforeach
        </ul>
    </x-card>
    <a href="{{ route('invitation.create', $team->slug)}}">Add member</a> --}}
    {{-- <div class="min-h-screen bg-background p-6"> --}}
    <div class="max-w-5xl mx-auto rounded-xl border border-border bg-white shadow-sm">

        <!-- Tabs -->
        <div class="border-b border-border px-6">
            <div class="flex flex-wrap gap-6 text-sm font-medium">
                <button class="border-b-2 border-primary py-4 text-primary">
                    Members ({{$memberCount}})
                </button>

                <button class="py-4 text-text hover:text-secondary">
                    Invitations (2)
                </button>

                <button class="py-4 text-text hover:text-secondary">
                    Multi-board guests (0)
                </button>

                <button class="py-4 text-text hover:text-secondary">
                    Join requests (0)
                </button>
            </div>
        </div>

        <!-- Top section -->
        @can('invite', $team)    
        <div class="flex flex-col gap-4 border-b border-border px-6 py-5 md:flex-row md:items-start md:justify-between">
            <p class="max-w-2xl text-sm text-text">
                Workspace members can view and join all Workspace visible boards
                and create new boards in the Workspace.
            </p>

            <a href="{{ route('invitation.create', $team->slug) }}" class="inline-flex items-center gap-2 rounded-md bg-primary px-4 py-2 text-sm font-medium text-white transition hover:opacity-90">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 9v6m3-3h-6m-2 8a7 7 0 100-14 7 7 0 000 14zm-8-7h.01" />
                </svg>
                Invite Workspace members
            </a>
        </div>
        @endcan

        <!-- Filter -->
        <div class="border-b border-border px-6 py-4">
            <input
                type="text"
                placeholder="Filter by name"
                class="w-full max-w-sm rounded-md border border-border bg-background px-4 py-2 text-sm text-secondary placeholder:text-text focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
            />
        </div>

        <!-- Member row -->
        @foreach ($team->users as $user)
        <div class="flex flex-col gap-4 px-6 py-4 md:flex-row md:items-center md:justify-between border-t border-border">

            <!-- Left -->
            <div class="flex items-center gap-4">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary text-sm font-semibold text-white">
                    {{$user->name[0]}}
                </div>

                <div class="flex flex-col md:flex-row md:items-center md:gap-6">
                    <div>
                        <span class="font-medium text-secondary">{{$user->name}}</span>
                        <span class="ml-1 text-text">{{$user->email}}</span>
                    </div>

                    <span class="text-sm text-text">
                        Join the team at {{$user->pivot->created_at->format('M d, Y')}}
                    </span>
                </div>
            </div>
            

            <!-- Right -->
            <div class="flex flex-wrap items-center gap-2">
                <button
                    class="rounded-md border border-border bg-white px-4 py-2 text-sm text-secondary hover:bg-background"
                >
                    Boards (1)
                </button>

                <button
                    class="rounded-md border capitalize border-border bg-white px-4 py-2 text-sm text-secondary hover:bg-background"
                >
                    {{$user->pivot->role}}
                </button>

                <button
                    class="rounded-md border border-border bg-white px-4 py-2 text-sm text-secondary hover:bg-background"
                >
                    Leave
                </button>
            </div>
        </div>
        @endforeach
    {{-- </div> --}}
</div>
</x-app-layout>