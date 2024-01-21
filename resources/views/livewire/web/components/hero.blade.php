<section class="relative overflow-hidden bg-white h-screen flex items-center">
    <div class="flex flex-col container px-4 py-8 gap-8 mx-auto md:flex-row md:gap-8 xl:gap-0 md:py-16">
        <div class="text-center md:text-left md:my-auto w-full md:w-7/12 z-10">
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl">
                Sua plataforma de controle financeiro
            </h1>
            <p class="max-w-2xl mb-6 text-gray-500 md:mb-8 md:text-lg">
                Organize suas contas, transações e mais em nossa plataforma intuitiva. <br>
                Seu dinheiro, suas regras, sua liberdade.
            </p>
            <a href="{{ route('filament.app.auth.register') }}"
                class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:ring-violet-300 transition-all ease-in-out duration-300">
                Cadastre-se
            </a>
            <a href="{{ route('filament.app.auth.login') }}"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center bg-white text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 transition-all ease-in-out duration-300">
                Faça login
                <x-filament::icon icon="heroicon-o-arrow-right-end-on-rectangle" class="w-5 h-5 ml-2 -mr-1" />
            </a>
        </div>
        <div class="absolute left-0 bottom-0 translate-y-[25%] translate-x-[-15%] scale-125 rotate-12 w-full md:rotate-0 md:relative md:scale-100 md:translate-x-0 md:translate-y-0 md:mt-0 md:w-5/12 md:flex">
            <img src="{{ asset('images/mockup.webp') }}" alt="mockup" class="w-full drop-shadow-2xl aspect-square">
        </div>
    </div>
</section>