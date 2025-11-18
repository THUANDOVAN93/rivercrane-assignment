<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $customerRole = Role::create(['name' => 'customer']);
        $editorRole = Role::create(['name' => 'editor']);

        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);

        $adminUser->roles()->attach($adminRole);

        $customerUser = User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
        ]);

        $customerUser->roles()->attach($customerRole);

        $editorUser = User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@example.com',
        ]);

        $editorUser->roles()->attach($editorRole);

        $customerEditorUser = User::factory()->create([
            'name' => 'Author/Editor',
            'email' => 'ae@example.com',
        ]);

        $customerEditorUser->roles()->attach($customerRole);
        $customerEditorUser->roles()->attach($editorRole);
    }
}
