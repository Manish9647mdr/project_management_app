<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Task::query();

        // default sort field
        $sortField = request("sort_field", "created_at");

        // default sort direction
        $sortDirection = request("sort_direction", "desc");

        // filter by name if  provided
        if (request("name")) {
            $query->where("name", "like", "%" . request("name") . "%");
        }

        // filter by status if provided
        if (request("status")) {
            $query->where("status", request("status"));
        }

        // fetch paginated and sorted results
        $tasks = $query->orderBy($sortField, $sortDirection)->paginate(10)->onEachSide(10);

        // return the results and query parameters to the inertia view
        return inertia("Task/Index", [
            "tasks" => TaskResource::collection($tasks),
            'queryParams' => request()->query() ?: null,
        ]);
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
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
