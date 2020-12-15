<div class="mt-10">
    <form method="GET" action="{{ url('my-community/' . $communityId . '/identify-vehicle-user') }}">
        @csrf
        <input type="hidden" name="communityId" value={{ $communityId }} />
        <div class="overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <x-text-input :input="['value' => null, 'name' => 'plateNumber', 'title' => 'Enter plate number']" />
            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Identify User
                </button>
            </div>
        </div>
    </form>
</div>
