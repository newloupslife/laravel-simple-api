<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Class ProjectController
 *
 * @package App\Http\Controllers\API
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $projects = Project::all();

        return response([
            'projects' => ProjectResource::collection($projects),
            'message' => 'Retrieved successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'cost' => 'required'
        ]);

        if ($validator->fails()) {
            return response([
                'error' => $validator->errors(),
                'Validation Error'
            ]);
        }

        $project = Project::query()->create($data);

        return response(
            [
                'project' => new ProjectResource($project),
                'message' => 'Created successfully'
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return Response
     */
    public function show(Project $project): Response
    {
        return response([
            'project' => new ProjectResource($project),
            'message' => 'Retrieved successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return Response
     */
    public function update(Request $request, Project $project): Response
    {
        $project->update($request->all());

        return response([
            'project' => new ProjectResource($project),
            'message' => 'Update Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return Response
     */
    public function destroy(Project $project): Response
    {
        $project->delete();

        return response(['message' => 'Deleted']);
    }
}
