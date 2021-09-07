<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\DeleteProjectsRequest;
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->keyword)
            $projects = Project::with('client')->paginate(10);
        else
        {
            $projects = Project::with('client')->where('name', 'like', '%'.$request->keyword.'%')->paginate(10);
        }


        if($request->wantsJson())
        {
            return $projects;
        }
        else
        {
            return view('projects.index', compact('projects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create', [
            'clients' => Client::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        
        $project = new Project();
        $project->client_id = $request->client_id;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->price = $request->price;
        $project->deployed_at = $request->deployed_at;
        $project->save();

        $client = $project->client;

        Mail::to("admin.admin@admin.hr")->send(new ProjectCreated($project, $client, auth()->user()));        

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
         return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'), [
            'clients' => Client::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        $validated = $request->validated();
        
        $project->client_id = $request->client_id;
        $project->name = $request->name;
        $project->description = $request->description;
        $project->price = $request->price;
        $project->deployed_at = $request->deployed_at;
        $project->save();

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }


    public function destroyChecked(DeleteProjectsRequest $request)
    {
        $validated = $request->validated();

        $projectIds = explode(',', $request->projectsForDeleting);

        foreach($projectIds as $projectId)
        {
           $project = Project::where('id', '=', $projectId);
           $project->delete();
        }

        return back();
    }
}
