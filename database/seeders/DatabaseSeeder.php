<?php

namespace Database\Seeders;

use App\Models\SongPlay;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PlanSeeder::class,
            RolesAndPermissionsSeeder::class,
            UsersTableSeeder::class,
            // GenreSeeder::class,
            // SongPlay::factory()->count(10000)->create(),
        ]);
    }
}
