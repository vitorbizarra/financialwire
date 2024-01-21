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
            <input wire:model.lazy="form.name" type="text" placeholder="Seu nome"
                @class(['form-input', '!border-red-500'=> $errors->has('form.name')])>
            @error('form.name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email" class="form-label">
                Seu melhor email:
            </label>
            <input wire:model.lazy="form.email" type="email" placeholder="eu@financialwire.com.br"
                @class(['form-input', '!border-red-500'=> $errors->has('form.email')])>
            @error('form.email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="subject" class="form-label">
                Assunto:
            </label>
            <input wire:model.lazy="form.subject" type="text" placeholder="Motivo do contato"
                @class(['form-input', '!border-red-500'=> $errors->has('form.subject')])>
            @error('form.subject')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="sm:col-span-2">
            <label for="message" class="form-label">
                Mensagem:
            </label>
            <textarea wire:model.lazy="form.message" rows="6" placeholder="Sua mensagem..."
                @class(['form-input', '!border-red-500'=> $errors->has('form.message')])></textarea>
            @error('form.message')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
            class="form-button">
            Enviar
        </button>
    </form>
</section>