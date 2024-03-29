<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskStatuses = TaskStatus::latest()->paginate(10);
        return view('task_statuses.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $this->authorize('task_statuses.create', TaskStatus::class);
        return view('task_statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'color' => 'required',
        ]);

        $colorRgb = $this->hexToRgb($request);

        TaskStatus::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'color' =>  $colorRgb
        ]);

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'action_type' => 'Creación de Estado Tarea',
        ]);

        return redirect()->route('task_statuses.index')->with('success', 'Estado de Tarea Creado');
    }
    /**
     * Display the specified resource.
     */
    public function show(TaskStatus $taskStatus)
    {
        $this->authorize('task_statuses.show', TaskStatus::class);
        return view('task_statuses.show', compact('taskStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus)
    {
        $this->authorize('task_statuses.edit', TaskStatus::class);
        return view('task_statuses.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskStatus $taskStatus)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'color' => 'required',
    ]);

    $colorRgb = $this->hexToRgb($request);

    $taskStatus->update([
        'nombre' => $request->input('nombre'),
        'descripcion' => $request->input('descripcion'),
        'color' =>  $colorRgb
    ]);

    UserActivity::create([
        'user_id' => auth()->user()->id,
        'action_type' => 'Actualización de Estado Tarea',
    ]);

    return redirect()->route('task_statuses.index')->with('success', 'Estado de Tarea Actualizado');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $taskStatus)
    {
        $this->authorize('task_statuses.destroy', TaskStatus::class);

        // Verificar si el ID del estado de tarea es 1, 2 o 3
        if ($taskStatus->id === 1 || $taskStatus->id === 2 || $taskStatus->id === 3) {
            return redirect()->route('task_statuses.index')->with('error', 'No se pueden eliminar los estados de tarea por defecto.');
        }

        // Actualizar las tareas asociadas para que queden sin estado de tarea
        $taskStatus->tasks()->update(['status_id' => null]);

        // Eliminar el estado de tarea
        $taskStatus->delete();

        return redirect()->route('task_statuses.index')->with('error', 'Estado de tarea eliminado exitosamente.');
    }



    public function hexToRgb(Request $request)
{
    // Elimina el caracter '#' si está presente
    $hex = Str::replaceFirst('#', '', $request->input('color'));

    // Convierte cada par de caracteres a un número decimal
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    // Retorna el color en formato RGB
    return "$r, $g, $b";
}


}
