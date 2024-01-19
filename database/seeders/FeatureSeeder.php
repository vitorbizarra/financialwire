<?php

namespace Database\Seeders;

use App\Models\Content\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::create([
            'title' => 'Gráficos Dinâmicos',
            'text' => 'Visualize seus dados financeiros de forma dinâmica e intuitiva, facilitando a análise e tomada de decisões estratégicas.',
            'icon' => 'heroicon-m-presentation-chart-line',
            'sort' => 1
        ]);

        Feature::create([
            'title' => 'Gerenciamento Simples',
            'text' => 'Controle suas economias de maneira simples e eficiente, com ferramentas intuitivas que simplificam o planejamento financeiro.',
            'icon' => 'heroicon-m-banknotes',
            'sort' => 2
        ]);

        Feature::create([
            'title' => 'Acesso Multiplataforma',
            'text' => 'Tenha o controle financeiro na palma da sua mão, acesse a plataforma de onde estiver e mantenha suas finanças sempre sob controle.',
            'icon' => 'heroicon-m-device-phone-mobile',
            'sort' => 3
        ]);

        Feature::create([
            'title' => 'Exportação Rápida',
            'text' => 'Exporte suas transações com facilidade para diversos formatos de arquivos, garantindo agilidade e praticidade na sua gestão financeira.',
            'icon' => 'heroicon-m-document-arrow-up',
            'sort' => 4
        ]);

        Feature::create([
            'title' => 'Organização Inteligente',
            'text' => 'Filtre, agrupe e pesquise suas transações de forma inteligente, simplificando a análise e otimizando a tomada de decisões.',
            'icon' => 'heroicon-m-rectangle-stack',
            'sort' => 5
        ]);

        Feature::create([
            'title' => 'Suporte Personalizado',
            'text' => 'Conte com um suporte dedicado para esclarecer dúvidas e fornecer orientações personalizadas, garantindo o melhor aproveitamento da plataforma.',
            'icon' => 'heroicon-m-users',
            'sort' => 6
        ]);
    }
}
