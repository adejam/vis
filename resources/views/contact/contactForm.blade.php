<x-welcome-layout>
    @section('title', 'Contact Us')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <h2 class="text-center font-bold text-2xl">Contact Us</h2>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-xl overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('contact-us.send') }}" class="mw-md">
                @csrf
                <div class="overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        
                            <x-text-input :input="['value' => null, 'name' => 'name', 'title' => 'Full Name']" />
                            <x-text-input :input="['value' => null, 'name' => 'email', 'title' => 'Email']" />
                                <x-text-input :input="['value' => null, 'name' => 'subject', 'title' => 'Subject']" />
                            <x-text-area-input :input="['value' => null, 'name' => 'message', 'title' => 'Message']" />  
                        
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
    
    {{-- <form method="POST" action="{{ route('contact-us.send') }}" class="mw-md">
        @csrf

        <div class="overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                
                    <x-text-input :input="['value' => null, 'name' => 'name', 'title' => 'Enter Full Name']" />
                    <x-text-input :input="['value' => null, 'name' => 'email', 'title' => 'Enter Email']" />
                        <x-text-input :input="['value' => null, 'name' => 'subject', 'title' => 'Enter Subject']" />
                    <x-text-area-input :input="['value' => null, 'name' => 'message', 'title' => 'About Message']" />  
                
            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Submit
                </button>
            </div>
        </div>
    </form> --}}
</x-app-layout>
