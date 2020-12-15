@if ($userId === $authUser)
                         <i class="inline-block py-1 px-2 text-xs font-semibold text-center whitespace-no-wrap align-baseline rounded-full bg-green-400 text-white">Main Admin</i>
                        @else 
                        <i class="inline-block py-1 px-2 text-xs font-semibold text-center whitespace-no-wrap align-baseline rounded-full bg-teal-400 text-white">Acting Admin</i>
                        
                        @endif