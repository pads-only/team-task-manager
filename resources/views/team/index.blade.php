<h1>Teams</h1>

@forelse ($teams as $team)
    <div>
        <h2>{{$team->name}}</h2>
        <small>owner: {{$team->owner->name}}</small>
        <ul>
            <h3>Members: </h3>
            @foreach ($team->users as $member)
            <li>{{$member->name}} : {{$member->pivot->role}}</li>
            @endforeach
        </ul>
    </div>
@empty
    <p>You have no teams yet my nigga</p>
@endforelse

