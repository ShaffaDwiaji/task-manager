<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function __construct(){
    //     $this -> middleware(["role:superadmin"]);
    //  }

    public function index()
    {
        $this -> authorize('Lihat Task');
        $task = Task::latest()->paginate(10);
        return response()->json($task);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $task = Task::created()
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request -> all(), [
            'title' => 'required', 
            'description' => 'required', 
            'status' => 'required|in:pending, in_progress, completed', 
            'due_date' => 'required|date',
            'user_id' => 'required'
        ]);

        $store = Task::create([
            'title' => $request -> title,
            'description' => $request -> description,
            'status' => $request -> status,
            'due_date' => $request -> due_date,
            'user_id' => $request -> user_id,
        ]);

        return new ApiResource(
            $store, "Berhasil", "Completed"
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        // return response()->json(
        //     ["pesan" => "Berhasil", 
        //     "status" => "Completed", 
        //     "data" => $task]);
        return new ApiResource (
            $task, 
            "Berhasil",
            "Completed",
        );
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
        $task = Task::find($id);
        $task -> delete();
        return new ApiResource(
            $task, "Berhasil dihapus", "True"
        );
    }
}
