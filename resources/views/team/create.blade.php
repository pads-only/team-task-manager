<x-app-layout>
    <x-card>
        <form action="{{ route('team.store') }}" method="post">
            <h2 class="text-2xl font-semibold">Create team</2>
            @csrf
            <div class="space-y-2 mb-2">
                <x-input-label for="name">Give your team a name</x-input-label>
                <x-text-input type="text" name="name" id="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <x-primary-button>Save</x-primary-button>
        </form>
    </x-card>
</x-app-layout>
