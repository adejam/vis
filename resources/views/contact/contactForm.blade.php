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
            <div class="bg_address p-3 my-0 mx-auto border rounded bg-gray-900 c_pw">
                <div class="flex mb-3">
                  <div class="mr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width:15px; height:15px;">
                      <path d="M256,8C119,8,8,119,8,256S119,504,256,504,504,393,504,256,393,8,256,8Zm92.49,313h0l-20,25a16,16,0,0,1-22.49,2.5h0l-67-49.72a40,40,0,0,1-15-31.23V112a16,16,0,0,1,16-16h32a16,16,0,0,1,16,16V256l58,42.5A16,16,0,0,1,348.49,321Z" style="fill: #ffc107"></path>
                    </svg>
                  </div>
                  <div>
                    <h3 class="text-lg font-bold capitalize">Service Hours</h3>
                    <p>
                      <strong class="name">Monday-Friday:</strong> 8am-5pm <br>
                    </p>
                  </div>
                </div>
                <div class="flex">
                  <div class="mr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width:15px; height:15px;">
                      <path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z" style="fill: #ffc107"></path>
                    </svg>
                  </div>
                  <div class="cursur-pointer">
                    <p>+234 812-4009-005</p>
                  </div>
                </div>
              </div>
        </div>
    </div>
</x-app-layout>
