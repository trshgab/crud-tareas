<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        DB::table('users')->insert(array(
        	"name" => "gabriel ",
        	"email" => "gmrgabo@gmail.com",
        	"password" => Hash::make("12341234"),
            "current_team_id" => 1
        ));
        DB::table('users')->insert(array(
            "name" => "owner",
            "email" => "owner@own.com",
            "password" => Hash::make("12341234"),
            "current_team_id" => 2
        ));
        DB::table('users')->insert(array(
            "name" => "owner",
            "email" => "owner2@own.com",
            "password" => Hash::make("12341234"),
            "current_team_id" => 3
        ));
    } 
}
