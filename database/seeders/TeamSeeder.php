<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;
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
            "personal_team" =>0,
        	
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

        $team= Team::find(1); 
        $user1= User::find(1);
        $team->users()->attach($user1->id);

        $team= Team::find(2); 
        $user2= User::find(2);
        $team->users()->attach($user2->id);

        $team= Team::find(3); 
        $user3= User::find(3);
        $team->users()->attach($user3->id);

        
    }
}
