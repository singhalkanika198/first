<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Project;

use Illuminate\Filesystem\Filesystem;

class ProjectController extends Controller
{
    //

    public function __construct()
    {
        // this allows user to view any page only when user is signed in.
        $this->middleware('auth');
        $this->middleware('auth')->only('index');

    }

    public function index()
    {
        //dd(app(FileSystem::class)); // app=resolving the parameter written inside ; dd= dump on console. dump and die
        $projects = \App\Project::all();

        //$projects=\App\Project::where('title','vvv')->get();
        //return $projects;
        return view('projects.index', ['projects' => $projects]);
    }
    
    public function create()
    {
        return view('projects.create');    
    }

    //public function show(Project $project) {
    public function show($id)
    {
        $project = Project::find($id);
        //return $project;
        //return view('projects.create');
        return view('projects.show', ['project' => $project]);    
    }


    //    auto resolving:
    public function show1(FileSystem $file)
    {
        dd($file);
    }

    public function store()
    {
        $project = new Project();
        //validation
        request()->validate(
            [
            'title'=>'required',
            'description' =>'required'
            ]
        );




        $project->title=request('title');
        $project->description=request('description');
        $project->save();
        //return request()->all();
        //return view('projects.create');
        // return $request()->description;
        // return $project;
        return redirect('/projects');    
    }

    public function edit($id)
    {
        //return $id;
        $project = Project::find($id);
        //return $project;
        return view('projects.edit', ['project' => $project]);
    }


    public function update($id)
    {
        //return $id;
        $project = Project::findorFail($id);
        $project->title=request('title');
        $project->description=request('description');
        $project->save();
        return redirect('/projects');    
        //return view('projects.edit', ['project' => $project]);
    }

    public function destroy($id)
    {
        //return $id;
        Project::findorFail($id)->delete();
        // $project->title=request('title');
        // $project->description=request('description');
        // $project->save();
        return redirect('/projects');    
        //return view('projects.edit', ['project' => $project]);
    }


    // public function show() {return $projects(0);
    // }
    // public function show() {
    //     $project= Razorpay::all();
    //     return $project;
    //     //return view('projects.show');
    // }

    // public function create() {
    //     return view('projects.create');
    // }

    // public function delete() {
    //     return view('projects.delete');
    // }
    
    // public function page() {
    //     return view('projects.page');
    // }

    // public function kanika() {
    //     //return "mcnvmvn";
    //     Razorpay::create(request(['title','description']));
    //     return redirect('/projects');
    //     return request()->all();
    // }

    // public function edit() {
    //     return view('projects.edit');
    // }
}
