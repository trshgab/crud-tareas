<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Cargando Status de tareas');
        DB::table('task_statuses')->insert(array(
        	"nombre" => "Completado",
            "descripcion" => "La Tarea fue Completada",
        	
        ));
        DB::table('task_statuses')->insert(array(
        	"nombre" => "En Proceso",
            "descripcion" => "La Tarea esta en Proceso",
        	
        ));
        DB::table('task_statuses')->insert(array(
        	"nombre" => "Pendiente",
            "descripcion" => "La Tarea esta Pendiente",
        	
        ));
    }
}
