<?php

namespace Database\Seeders;

use App\Models\Transactions\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        Category::create([
            'user_id' => $user->id,
            'name' => 'Salário',
            'slug' => 'salario',
            'icon' => 'heroicon-c-banknotes',
            'color' => '#00fa4d',
        ]);
        Category::create([
            'user_id' => $user->id,
            'name' => 'Outros',
            'slug' => 'outros',
            'icon' => 'heroicon-o-ellipsis-horizontal-circle',
            'color' => '#d60000',
        ]);
        Category::create([
            'user_id' => $user->id,
            'name' => 'Cartão de Crédito',
            'slug' => 'cartao-de-credito',
            'icon' => 'heroicon-m-credit-card',
            'color' => '#fc7900',
        ]);
        Category::create([
            'user_id' => $user->id,
            'name' => 'Educação',
            'slug' => 'educacao',
            'icon' => 'heroicon-m-academic-cap',
            'color' => '#6a00bd',
        ]);

    }
}
