<?php

namespace Database\Seeders;

use App\Enums\UserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'first_name' => 'Foo',
            'last_name' => 'Bar',
            'email' => 'foo@bar.com',
            'role' => UserRoles::Admin
        ]);
    }
}
