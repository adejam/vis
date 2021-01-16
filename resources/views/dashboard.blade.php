<x-app-layout>
    @section('title', "Home")

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white bg-opacity-25 grid grid-cols-1">
                <x-welcome-home />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
