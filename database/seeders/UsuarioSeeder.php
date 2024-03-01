<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
use Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Cargando Usuarios Admin');
        User::create(array(
        	"name" => "Owner",
        	"email" => "owner@owner.com",
        	"password" => Hash::make("owner")
        ));
        User::create([
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => Hash::make("admin")
        ]);
        User::create(array(
            "name" => "User",
            "email" => "user@user.com",
            "password" => Hash::make("user")
        ));
    } 
}
