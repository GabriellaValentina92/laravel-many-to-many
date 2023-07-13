<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    private $validation = [
        'title'               => 'required|string|max:200',
        'type_id'             => 'required|integer|exists:types,id',
        'project_image'       => 'url|max:200',
        'img_file'            => 'nullable|image|max:1024',
        'project_description' => 'required|string',
        'url_github'          => 'required|url|max:200',
        'technologies.*'      => 'integer|exists:technologies,id',   
    ];

    private $validation_messages = [
        'required'  => 'Il campo :attribute è obbligatorio',
        'max'       => 'Il campo :attribute non può superare i :max caratteri',
        'url'       => 'Il campo deve essere un url valido',
        'exists'    => 'id non valido',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation, $this->validation_messages);

        $data = $request->all();
        //salvare img nella cartella upload
        $imagePath = Storage::put('uploads', $data['img_file']);

        // salvare i dati nel db (questo metodo anche se è più lungo è il più sicuro)
        $newProject = new Project();

        $newProject->title = $data['title'];
        $newProject->type_id = $data['type_id'];
        $newProject->project_image = $data['project_image'];
        $newProject->img_file = $imagePath;
        $newProject->project_description = $data['project_description'];
        $newProject->url_github = $data['url_github'];
        $newProject-> save();

        
        unset($data['_token']);

        //associare technology
        $newProject->technologies()->sync($data['technologies'] ?? []);

        return redirect()-> route('admin.projects.show', ['project'=> $newProject]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate($this->validation, $this->validation_messages);

        $data = $request->all();

        if ($data['img_file']) {
            // salvare l'immagine nuova
            $imagePath = Storage::put('uploads', $data['img_file']);

            // eliminare l'immagine vecchia
            if ($project->img_file) {
                Storage::delete($project->img_file);
            }

            // aggiormare il valore nella colonna con l'indirizzo dell'immagine nuova
            $project->img_file = $imagePath;
        }

        
        $project->title = $data['title'];
        $project->type_id = $data['type_id'];
        $project->project_image = $data['project_image'];
        $project->project_description = $data['project_description'];
        $project->url_github = $data['url_github'];
        $project-> update();

        //$project->technologies()->sync(isset($data['technologies']) ? $data['technologies'] : []);
        $project->technologies()->sync($data['technologies'] ?? []);
        unset($data['_token']);
        return to_route('admin.projects.show', ['project'=> $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->img_file) {
            Storage::delete($project->img_file);
        }
        //eliminare le righe della tabella ponte prima del delete
        $project->technologies()->detach();

        $project->delete();

        return to_route('admin.projects.index')->with('delete_success', $project);
    }
}
