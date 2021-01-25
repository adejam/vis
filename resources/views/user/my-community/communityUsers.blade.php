<x-app-layout>
    @section('title', $communityName)
        <x-community-nav :communityId="$communityId" :communityName="$communityName" />
        <div>
            <h3 class="text-lg font-semibold text-gray-900 my-2 text-center">Community Users</h3>
            <div>
                @if (count($communityVehicleUsers) > 0)
                    @foreach ($communityVehicleUsers as $user)

                        <article class="p-3 m-3 text-center border-gray-100 border hover:bg-lightblue rounded-full">
                            <a class="text-lg font-semibold text-primary w-full flex justify-center"
                                href="{{ url('my-community/' . $communityId . '/community-user-vehicles/' . $user->username) }}">
                                {{ $user->name }} {{ $user->lastname }} &commat;{{ $user->username }}
                            </a>
                        </article>
                    @endforeach
                    <div class="p-3">
                        {{ $communityVehicleUsers->render() }}
                    </div>

                @else
                    <div class="mt-3">
                        <p class="text-center">You have not Added any vehicle.</p>
                    </div>
                @endif
            </div>
        </div>
    </x-app-layout>
