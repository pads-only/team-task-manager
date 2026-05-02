<x-app-layout>

    <h1>Teams</h1>
    <a href="{{ route('team.create') }}">Create team</a>
    @forelse ($teams as $team)
    <x-card class="my-2">
        <a href="{{ route('team.show', $team->slug) }}">
            <h2>{{$team->name}}</h2>
            <small>owner: {{$team->owner->name}}</small>
        </a>
    </x-card>
    @empty
    <p>You have no teams yet!</p>
    @endforelse
</x-app-layout>

