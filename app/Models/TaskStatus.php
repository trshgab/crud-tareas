<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    use HasFactory;

    protected $table = 'task_statuses';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion'];

    public function role(){
        return $this->hasMany(Task::class, 'status_id');
    }
}
