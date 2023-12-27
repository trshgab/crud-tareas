<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Cargando Teams');
        DB::table('teams')->insert(array(
        	"user_id" => 1,
            "name" => "Owner",
            "personal_team" =>1,
        	
        ));
        DB::table('teams')->insert(array(
        	"user_id" => 2,
            "name" => "Admin",
            "personal_team" =>0,
        	
        ));
        DB::table('teams')->insert(array(
        	"user_id" => 3,
            "name" => "User",
            "personal_team" =>0,
        	
        ));
        
    }
}
