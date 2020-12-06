<x-app-layout>
    @section('title', 'My-Communities')
        <div class="mx-auto py-10 sm:px-6 lg:px-8">
            <x-session-message />
            @if (count($communities) > 0)
            @foreach ($communities as $community)
                <section class="p-3 m-3 text-center border-gray-100 border hover:bg-lightblue rounded-full">
                    <a class="text-lg font-semibold text-primary w-full inline-block"
                        href="{{ url('my-community/' . $community->communityId) }}">
                        {{ __($community->communityName) }}
                        @if ($community->userId === Auth::user()->id)
                         <i class="inline-block py-1 px-2 text-xs font-semibold text-center whitespace-no-wrap align-baseline rounded-full bg-green-400 text-white">Main Admin</i>
                        @else 
                        <i class="inline-block py-1 px-2 text-xs font-semibold text-center whitespace-no-wrap align-baseline rounded-full bg-teal-400 text-white">Acting Admin</i>
                        
                        @endif
                    </a>
                </section>
            @endforeach
            @else 
            <section class="p-3 m-3 text-center border-gray-100 border rounded-full">
                <p class="text-lg font-semibold text-gray=100">
                    You have not created any community
                </p>
            </section>
            @endif
            <section class="hidden sm:block">
                <div class="py-8">
                    <div class="border-t border-gray-200"></div>
                </div>
            </section>
            <section class="mt-10 sm:mt-0">
                <div class="">
                    <div class="">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Create Community</h3>
                        </div>
                    </div>


                    <div class="mt-5 md:mt-0">
                        <form method="POST" action="{{ route('community.add') }}">
                            @csrf
                            <div class="overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    
                                        <x-text-input :input="['name' => 'communityName', 'title' => 'Community Name']" />
                                        <x-text-input :input="['name' => 'communityLocation', 'title' => 'Community Location']" />
                                        <x-text-area-input :input="['name' => 'aboutCommunity', 'title' => 'About Community']" />  
                                    
                                </div>

                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </section>

        </div>
    </x-app-layout>
