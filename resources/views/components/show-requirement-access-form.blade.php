<form method="POST" action="{{ route('vehicle.access.grantOrRemove') }}">
    @csrf
    <input type="hidden" value="{{ $userVehicleId }}" name="userVehicleId" />
    <input type="hidden" value="{{ $communityId }}" name="communityId" />
    <input type="hidden" value="{{ $accessName }}" name="accessName" />
    <button type="submit"
        class="inline-flex items-center px-4 py-1 {{ $accessType ? 'bg-primary' : 'bg-red-500' }} border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
        {{ $accessType ? 'Grant Access' : 'Remove Access' }}
    </button>
</form>
