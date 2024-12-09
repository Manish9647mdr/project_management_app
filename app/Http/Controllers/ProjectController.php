<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Project::query();

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
        $projects = $query->orderBy($sortField, $sortDirection)->paginate(10)->onEachSide(10);

        // return the results and query parameters to the inertia view
        return inertia("Project/Index", [
            "projects" => ProjectResource::collection($projects),
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
    public function store(StoreProjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return inertia('Project/Show', [
            'project' => new ProjectResource($project),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
