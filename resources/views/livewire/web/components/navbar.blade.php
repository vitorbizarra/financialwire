<nav class="w-full bg-white border-gray-200 dark:bg-gray-900 shadow fixed z-20 top-0 start-0">
    <div class="container flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
                {{ env('APP_NAME')}}
            </span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @auth
            <a href="{{ route('filament.app.pages.dashboard') }}" class="flex items-center content-center">
                <button type="button"
                    class="text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800 transition-all ease-in-out">
                    Painel
                </button>
            </a>

            @endauth

            @guest
            <div class="hidden md:flex gap-2">
                <a href="{{ route('filament.app.auth.login') }}"
                    class="text-violet-700 border border-violet-700 hover:bg-violet-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800 transition-all ease-in-out">
                    Faça Login
                </a>
                <a href="{{ route('filament.app.auth.register') }}"
                    class="text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800 transition-all ease-in-out">
                    Cadastre-se
                </a>
            </div>
            @endguest

            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
                class="flex flex-col font-medium mt-4 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-violet-700">
                        Início
                    </a>
                </li>
                <li>
                    <a href="#features"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-violet-700">
                        Vantagens
                    </a>
                </li>
                <li>
                    <a href="#contact"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-violet-700">
                        Contato
                    </a>
                </li>

                @guest
                <li class="md:hidden">
                    <a href="{{ route('filament.app.auth.login') }}"
                        class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-violet-700 d:dark:hover:text-violet-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Faça Login
                    </a>
                </li>

                <li class="md:hidden">
                    <a href="{{ route('filament.app.auth.register') }}"
                        class="block py-2 px-3 md:p-0 bg-violet-700 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-violet-700 d:dark:hover:text-violet-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Cadastre-se
                    </a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>