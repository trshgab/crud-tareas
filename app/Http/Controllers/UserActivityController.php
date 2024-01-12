<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserActivityController extends Controller
{

    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = UserActivity::with('user')->latest();

    // Búsqueda por Usuario
    if ($request->filled('search')) {
        $query->whereHas('user', function ($userQuery) use ($request) {
            $userQuery->where('name', 'like', '%' . $request->input('search') . '%');
        });
    }

    // Búsqueda por Tipo de Acción
    if ($request->filled('action_type')) {
        $query->where('action_type', 'like', '%' . $request->input('action_type') . '%');
    }

    // Búsqueda por Día
    if ($request->filled('day')) {
        $query->whereDate('created_at', '=', $request->input('day'));
    }



    $userActivities = $query->paginate(10);

    return view('user_activities.index', compact('userActivities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->authorize('user_activities.show', UserActivity::class);
        $userActivities = UserActivity::find($id);

        return view('user_activities.show', compact('userActivities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
