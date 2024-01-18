<?php

namespace App\Http\Controllers;

use App\models\Task;
use App\models\TaskStatus;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{

    public function index(Request $request, Task $task)
    {
        $search = $request->input('search');
        $statusId = $request->input('status_id');
        $day = $request->input('day');
    
        $tasks = Task::when($search, function ($query) use ($search) {
                $query->where('titulo', 'like', '%' . $search . '%');
            })
            ->when($statusId, function ($query) use ($statusId) {
                $query->where('status_id', $statusId);
            })
            ->when($day, function ($query) use ($day) {
                $query->whereDate('created_at', $day);
            })
            ->latest()
            ->paginate(10);

            $task->load('creator');
    
        $statuses = TaskStatus::all(); // Esto es necesario para llenar las opciones en el formulario
        $users = User::all();
    
        return view('tasks.index', compact('tasks', 'statuses','users'));
    }


    public function create()
    {

        $this->authorize('tasks.create', Task::class);

        $taskStatuses = TaskStatus::all();
        $users = User::all();

        return view('tasks.create', compact('taskStatuses','users'));
    }


    public function store(Request $request)
    {
        $usuarioAutenticado = Auth::user();
        


        Task::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_limite' => $request->input('fecha_limite'),
            'user_id' => $request->input('user_id'),
            'status_id' => $request->input('status_id'),
            'task_creator'=> $request->input('task_creator'),
        ]);

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'action_type' => 'Creación de Tarea',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente.');
    }


    public function show(Task $task)
    {
        $this->authorize('tasks.show', Task::class);
        return view('tasks.show', compact('task'));
    }


    public function edit($id)
    {
        $this->authorize('tasks.edit', Task::class);
        $task = Task::find($id);
        $taskStatuses = TaskStatus::all();



        return view('tasks.edit', compact('task', 'taskStatuses'));
    }


    public function update(Request $request, Task $task)
    {
        $usuarioAutenticado = Auth::user();
        
        $task->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_limite' => $request->input('fecha_limite'),
            'user_id' => $usuarioAutenticado->id,
            'status_id' => $request->input('status_id'),
        ]);

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'action_type' => 'Edicion de Tarea',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada exitosamente.');
    }


    public function destroy(Task $task)
    {
        $this->authorize('tasks.destroy', Task::class);
        $task->delete();

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'action_type' => 'Eliminacion de Tarea',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea Eliminada Correctamente');
    }
}
