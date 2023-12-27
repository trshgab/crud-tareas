<?php

namespace App\Http\Controllers;

use App\models\Task;
use App\models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        $taskStatuses = TaskStatus::all();
        return view('tasks.create', compact('taskStatuses'));
    }


    public function store(Request $request)
    {
        $usuarioAutenticado = Auth::user();

        Task::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_limite' => $request->input('fecha_limite'),
            'user_id' => $usuarioAutenticado->id,
            'status_id' => $request->input('status_id'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente.');
    }


    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }


    public function edit($id)
    {
        $task = Task::find($id);
        $taskStatuses = TaskStatus::all();

        return view('tasks.edit', compact('task', 'taskStatuses'));
    }


    public function update(Request $request, Task $task)
    {
        $task->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'fecha_limite' => $request->input('fecha_limite'),
            'user_id' => $request->input('user_id'),
            'status_id' => $request->input('status_id'),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada exitosamente.');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea Eliminada Correctamente');
    }
}
