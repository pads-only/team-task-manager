<x-app-layout>
    @forelse ($invitations as $invitation)
        <h1>Invitation to join : {{$invitation->team->name}}</h1>

        <p>click this link: <a href="{{ route('invitation.show', $invitation->token) }}">View invitation</a></p>
    @empty
        <p>No invitation found</p>
    @endforelse
</x-app-layout>