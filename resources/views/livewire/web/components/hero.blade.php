<section class="bg-white h-screen flex items-center dark:bg-gray-900">
    <div class="flex flex-col max-w-screen-xl px-4 py-8 gap-8 mx-auto md:flex-row md:gap-8 xl:gap-0 md:py-16">
        <div class="text-center md:text-left w-full md:w-7/12">
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                Sua plataforma de controle financeiro
            </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 md:mb-8 md:text-xl dark:text-gray-400">
                Organize suas contas, transações e mais em nossa plataforma intuitiva. <br>
                Seu dinheiro, suas regras, sua liberdade.
            </p>
            <a href="{{ route('filament.app.auth.register') }}"
                class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:ring-violet-300 dark:focus:ring-violet-900 transition-all ease-in-out duration-300">
                Cadastre-se
            </a>
            <a href="{{ route('filament.app.auth.login') }}"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800 transition-all ease-in-out duration-300">
                Faça login
                <x-filament::icon icon="heroicon-o-arrow-right-end-on-rectangle"
                        class="w-5 h-5 ml-2 -mr-1" />
            </a>
        </div>
        <div class="md:mt-0 w-full md:w-5/12 md:flex">
            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
        </div>
    </div>
</section>