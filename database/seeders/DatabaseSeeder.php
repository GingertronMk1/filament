<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $adminEmail = 'admin@filament.local';

        if (!app()->isProduction() && !User::where('email', $adminEmail)->exists()) {
            User::create([
                'name' => 'admin',
                'email' => $adminEmail,
                'password' => 'filament'
            ]);
        }

        $this->call([
            PositionSeeder::class,
        ]);
    }
}
