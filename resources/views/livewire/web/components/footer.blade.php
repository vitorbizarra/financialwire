<footer class="bg-white border-t">
    <div class="w-full container mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="#" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap">{{ env('APP_NAME') }}</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0">
                <li>
                    <a href="#"
                        class="me-4 md:me-6 hover:text-violet-700 transition-all ease-in-out duration-300">
                        Início
                    </a>
                </li>
                <li>
                    <a href="#features"
                        class="me-4 md:me-6 hover:text-violet-700 transition-all ease-in-out duration-300">
                        Vantagens
                    </a>
                </li>
                <li>
                    <a href="#contact"
                        class="me-4 md:me-6 hover:text-violet-700 transition-all ease-in-out duration-300">
                        Contato
                    </a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center">
            © 2023 
            <a href="#" class="hover:underline">{{ env('APP_NAME') }}™</a>. 
            Todos direitos reservados.
        </span>
    </div>
</footer>