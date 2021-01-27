<x-app-layout>
    @section('title', $communityName)
        <x-community-nav :communityId="$communityId" :communityName="$communityName" />
        <div>
            <h3 class=" font-semibold text-gray-900 my-2 text-center">User Registration Requests</h3>
            <x-community-vehicle-users type="regRequest" :communityVehicleUsers="$communityVehicleUsers"
                :communityId="$communityId" />
            <div class="p-3">
                {{$communityVehicleUsers->render()}}
            </div>
        </div>
    </x-app-layout>
