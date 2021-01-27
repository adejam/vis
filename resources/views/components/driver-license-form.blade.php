<div class="mt-10 sm:mt-0">
<div class="md:grid md:grid-cols-3 md:gap-6">
<div class="md:col-span-1">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium text-gray-900">License Information</h3>

        <p class="mt-1 text-sm text-gray-600">
            Update your Driver's License ID.<br />
            You cannot update your Driver's License ID if you have a vehicle registered with a community
        </p>
    </div>
</div>
<div class="mt-5 md:mt-0 md:col-span-2">
    <form action="{{route('vehicle.license.update')}}" method="POST">
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <!-- Driver's License ID -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-text-input
                                 :input="['value' => Auth::user()->driverLicenseId, 'name' => 'driverLicenseId', 'title' => 'Driver License ID']" />
    
    
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Save
                </button>
            </div>
        </div>
    
    
    </form>
    
</div>
</div>
</div>