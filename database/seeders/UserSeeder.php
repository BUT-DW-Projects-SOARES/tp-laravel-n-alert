<?php

namespace Database\Seeders;

use App\Enums\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => UserRole::Admin,
        ]);

        $clientUser = User::factory()->create([
            'name' => 'Client',
            'email' => 'client@example.com',
            'role' => UserRole::Customer,
        ]);

        $customer = $clientUser->customer()->create([
            'label' => 'Entreprise Client',
        ]);

        $customer->contacts()->create([
            'email' => 'contact@client.com',
            'firstname' => 'Jean',
            'lastname' => 'Dupont',
        ]);
    }
}
