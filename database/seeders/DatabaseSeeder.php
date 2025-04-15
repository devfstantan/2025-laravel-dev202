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
        $users = User::factory(10)->create();
        foreach ($users as $user) {
            $user->profile()->create([
                "cin" => fake()->unique()->regexify('JF[0-9]{4,6}'),
                'city' => fake()->city()
            ]);
        }

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
    }
}
