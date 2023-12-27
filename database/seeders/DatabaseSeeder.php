<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsuarioSeeder::class);
        $this->call(TaskStatusSeeder::class);
        $this->call(TeamSeeder::class);
    //    \App\Models\User::factory(10)->create();
     //   \App\Models\Task::factory(10)->create();
    //    \App\Models\Team::factory(3)->create();
       

        // \App\Models\User::factory()->create();

        
    }
}
