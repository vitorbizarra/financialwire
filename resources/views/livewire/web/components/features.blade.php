<div>
    @if ($features->count() > 0)
    <section class="bg-violet-900 min-h-screen flex items-center py-8 md:py-16" id="features">
        <div class="mx-auto container px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">
                    Gestão Financeira Simplificada
                </h2>
                <p class="text-gray-200 sm:text-xl">
                    Simplifique suas finanças com gráficos interativos e controle total. Sua jornada para uma gestão
                    financeira eficiente começa aqui.
                </p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-3 md:gap-6 lg:gap-12 md:space-y-0">

                @foreach ($features as $feature)
                <div
                    class="py-6 px-4 bg-gray-100 border border-gray-100 rounded-lg shadow text-center group hover:bg-violet-900 transition-all ease-in-out duration-300">
                    <div
                        class="flex justify-center items-center mx-auto mb-4 w-10 h-10 rounded-full bg-violet-900 lg:h-16 lg:w-16 group-hover:bg-gray-100 transition-all ease-in-out duration-300">
                        <x-filament::icon :icon="$feature->icon"
                            class="w-5 h-5 text-gray-100 lg:w-8 lg:h-8 group-hover:text-violet-900 transition-all ease-in-out duration-300" />
                    </div>
                    <h3 class="mb-2 text-xl font-bold group-hover:text-gray-50 transition-all ease-in-out duration-300">
                        {{ $feature->title }}
                    </h3>
                    <p class="text-gray-500 group-hover:text-gray-100 transition-all ease-in-out duration-300">
                        {{ $feature->text }}
                    </p>
                </div>

                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>