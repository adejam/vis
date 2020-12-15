<x-welcome-layout>
    @section('title', 'Welcome')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <section class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div>
                        </div>
                    
                        <h3 class="mt-8 text-2xl">
                            Welcome to Communivis!
                        </h3>
                    
                        <article class="mt-6 text-gray-500">
                            Communivis provides a platform, for keeping records of vehicles and their users/owners in a
                            community. Communivis is
                            designed to identify a vehicle's user/owner via the vehicle's plate number which helps keeps
                            track of
                            the vehicle's that is eligible to be in a community or not. Communivis is designed with simple
                            user interface
                            that is easy navigate.
                        </article>
                    </section>
                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <x-welcome-home />
                    </div>
                </div>
            </div>
        </div>
    </x-welcome-layout>
