<div>
    @if (count($communityVehicleUsers) > 0)
        @foreach ($communityVehicleUsers as $user)
            
            <article class="p-3 m-3 text-center border-gray-100 border hover:bg-lightblue rounded-full">
                <a class="text-lg font-semibold text-primary w-full flex justify-center"
                    href="{{ $type === 'comUsers'? url('my-community/' . $communityId . '/vehicle-users/' . $user->username) : url('my-community/' . $communityId . '/registration-requests/' . $user->username) }}">
                    {{ $user->name }} {{ $user->lastname }} &commat;{{ $user->username }}
                </a>
            </article>
        @endforeach

    @else
        <div>
            @if ($type === 'comUsers')
                <p class="text-center">You have no registered users at the moment</p>
            @else
                <p class="text-center">You have no vehicle registration requests at the moment</p>
            @endif
        </div>
    @endif
</div>
