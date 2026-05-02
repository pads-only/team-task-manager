<x-app-layout>
    you are invited to become a member : {{$invitation->team->name}}
    <form action="{{ route('invitation.attach', $invitation->token) }}" method="POST">
        @csrf
        <x-primary-button>Accept</x-primary-button>
    </form>
</x-app-layout>