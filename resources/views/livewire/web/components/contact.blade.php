<section class="container mx-auto grid grid-cols-1 md:grid-cols-2 px-4 py-8 md:py-16 gap-8 md:gap-16" id="contact">
    <div class="max-sm:text-center">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">
            Entre em Contato
        </h2>
        <p class="font-light text-gray-500 sm:text-xl">
            Encontrou algum problema técnico? Gostaria de nos dar um feedback? Entre em contato!
            Estamos aqui para ajudar e receber suas sugestões.
        </p>
    </div>

    <form wire:submit="save" class="space-y-4">
        <div>
            <label for="subject" class="form-label">
                Nome:
            </label>
            <input type="text" class="form-input" placeholder="Seu nome">
        </div>

        <div>
            <label for="email" class="form-label">
                Seu melhor email:
            </label>
            <input type="email" class="form-input" placeholder="eu@financialwire.com.br">
        </div>

        <div>
            <label for="subject" class="form-label">
                Assunto:
            </label>
            <input type="text" class="form-input" placeholder="Motivo do contato">
        </div>

        <div class="sm:col-span-2">
            <label for="message" class="form-label">
                Mensagem:
            </label>
            <textarea rows="6" class="form-input" placeholder="Sua mensagem..."></textarea>
        </div>
        <button type="submit"
            class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-violet-700 sm:w-fit hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300">
            Enviar
        </button>
    </form>
</section>