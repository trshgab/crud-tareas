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
        	"name" => "gabriel",
        	"email" => "gmrgabo@gmail.com",
        	"password" => Hash::make("12341234")
        ));
        User::create([
            "name" => "admin",
            "email" => "admin@adm.com",
            "password" => Hash::make("12341234")
        ]);
        User::create(array(
            "name" => "user",
            "email" => "user@usr.com",
            "password" => Hash::make("12341234")
        ));
    } 
}
