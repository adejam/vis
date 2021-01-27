<footer class="flex flex-col pt-3 bg-white">
    <nav class="border-t border-gray-100 text-xs">
        <ul class="flex p-3 justify-center">
            <li class="mr-2 py-2 px-1  hover:text-primary text-dark"><a href="{{ url('/about-us') }}"
                    class=" {{ request()->routeIs('about-us') ? 'text-primary' : '' }}">About Us</a> </li>
            <li class="mr-2 py-2 px-1  hover:text-primary text-dark"><a href="{{ url('/privacy') }}"
                    class=" {{ request()->routeIs('privacy') ? 'text-primary' : '' }}">Privacy</a> </li>
            <li class="mr-2 py-2 px-1  hover:text-primary text-dark"><a href="{{ url('/faq') }}"
                    class=" {{ request()->routeIs('faq') ? 'text-primary' : '' }}">FAQ</a> </li>
            <li class="py-2 px-1  hover:text-primary text-dark"><a href="{{ url('/contact-us') }}"
                    class=" {{ request()->routeIs('contact-us') ? 'text-primary' : '' }}">Contact Us</a></li>
        </ul>
    </nav>
    <section class="flex flex-wrap p-3 bg-black">
        <h2 class="hidden">social</h2>
        <section class="socialIcons flex justify-center relative w-full md:w-6/12 sm:w-6/12  px-3 sm:order-2">
            <h2 class="hidden">social</h2>
            <a href="https://twitter.com/Adeleye_oj" target="_blank" rel="noopener noreferrer">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"
                            style="fill: #38a1f3;"></path>
                    </svg>
                </span>
            </a>
            <a href="https://linkedin.com/in/adeleye-jamiu" target="_blank" rel="noopener noreferrer">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"
                            style="fill: #0c8ff5;"></path>
                    </svg>
                </span>
            </a>
        </section>
        <section class="text-center relative w-full md:w-6/12 sm:w-6/12 sm:order-1 px-3">
            <h2 class="hidden">by</h2>
            <p class="text-gray-500 text-xs mt-3">© {{ date('Y') }} <a class="text-primary hover:text-lightblue"
                    href="https://adeleye-jamiu.netlify.app/" target="_blank" rel="noopener noreferrer">Adeleye
                    Jamiu</a>. All rights reserved.</p>
        </section>
    </section>
</footer>
