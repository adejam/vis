<div>
    @foreach ($communityVehicleUsers as $user)
        <div class="vehicle-class">
            <div class="">
                <p><b>Name: </b>{{ $user->name }} {{ $user->lastname }} @_{{ $user->username }}</p>
                @if ($type === 'comUsers')
                    <a href="{{ url('my-community/' . $communityId . '/vehicle-users/' . $user->username) }}">view</a>
                @else
                    <a
                        href="{{ url('my-community/' . $communityId . '/registration-requests/' . $user->username) }}">view</a>
                @endif
            </div>
        </div>
    @endforeach
</div>
