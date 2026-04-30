<h1>Create team</h1>
<form action="{{ route('team.store') }}" method="post">
    @csrf
    <div>
        <label for="name">Team Name</label>
        <input type="text" name="name" id="name">
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <button type="submit">Save</button>
</form>
