<x-app-layout>
    @section('title', $community->communityName)
        <x-session-message />
        <div class="mx-auto py-10 sm:px-6 lg:px-8">
            <x-community-nav :communityId="$community->communityId" :communityName="$community->communityName" />

            <section class="mt-10">
                <div class="">
                    <div class="">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-semibold text-gray-900">Edit Community</h3>
                        </div>
                    </div>


                    <div class="mt-5 md:mt-0">
                        <form method="POST" action="{{ route('community.update') }}">
                            @csrf
                            <input type="hidden" name="communityId" value={{ $community->communityId }} />
                            <div class="overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <x-text-input
                                        :input="['value' => $community->communityName, 'name' => 'communityName', 'title' => 'Community Name']" />
                                    <x-text-input
                                        :input="['value' => $community->communityLocation, 'name' => 'communityLocation', 'title' => 'Community Location']" />
                                    <x-text-area-input
                                        :input="['value' => $community->aboutCommunity, 'name' => 'aboutCommunity', 'title' => 'About Community']" />
                                </div>

                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </section>
            <section class="hidden sm:block">
                <div class="py-8">
                    <div class="border-t border-gray-200"></div>
                </div>
            </section>
            <section class="mt-10">
                <div class="">
                    <div class="">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-semibold text-gray-900">Delete Community</h3>
                        </div>
                    </div>


                    <div class="mt-5 md:mt-0">
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="button" id="modal-button"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Delete Community
                            </button>
                        </div>
                        <section id="modal" class="modal">
                            <div class="modal-content md:max-w-md">
                                <header class="modal-header">
                                    <h5 class="modal-title">Delete Community</h5>
                                    <button type="button" id="close-modal" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </header>
                                <article class="modal-body">
                                    <p>
                                        Are you sure you want to delete your community? Once your community is deleted, all of its resources and data will be permanently deleted.
                                         Please enter your password to confirm you would like to permanently delete your account.
                                    </p>
                                </article>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('community.delete') }}">
                                        @csrf
                                        <input type="hidden" name="communityId" value={{ $community->communityId }} />
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                            Delete Community
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

            </section>
        </div>
    </x-app-layout>
