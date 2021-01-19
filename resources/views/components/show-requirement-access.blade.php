@if ($communityRequirement)
    <li class="mb-2 py-3 px-5 border-b">
        <div class="flex justify-start">
            <p class="mr-2"><b>{{ $accessRequirement['requirement'] }}: </b></p>
            @if ($grantedAccess)
                Access Granted
            @else
                <x-show-requirement-access-form 
                accessType="1" 
                :userVehicleId="$userVehicleId"
                :communityId="$communityId"
                :accessName="$accessRequirement['accessName']"/>
            @endif
        </div>
    </li>
@else
    @if ($grantedAccess)
        <li class="mb-2 py-3 px-5 border-b">
            <div class="flex justify-start">
                <p class="mr-2"><b>{{ $accessRequirement['requirement'] }}: </b></p>
                <x-show-requirement-access-form 
                accessType="0" 
                :userVehicleId="$userVehicleId"
                :communityId="$communityId"
                :accessName="$accessRequirement['accessName']"/>
            </div>
        </li>
    @endif
@endif
