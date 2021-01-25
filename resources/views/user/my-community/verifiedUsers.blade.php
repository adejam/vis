<x-app-layout>
    @section('title', $communityName)
        <x-community-nav :communityId="$communityId" :communityName="$communityName" />
        <div>
            <h3 class="text-lg font-semibold text-gray-900 my-2 text-center">Community Users</h3>
        <x-community-vehicle-users type="comUsers" :communityVehicleUsers="$communityVehicleUsers" :communityId="$communityId" />
        <div class="p-3">
            {{$communityVehicleUsers->render()}}
        </div>
    </div>
</x-app-layout>