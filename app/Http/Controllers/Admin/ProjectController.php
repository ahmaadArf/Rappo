<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','store']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::all();
        return view('admin.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=About::select('title','id')->where('type','service2')->get();
        return view('admin.project.create',compact('services'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'client' => 'required',
            'category' => 'required',
            'website' => 'required',
            'image' => 'required',
            'about_id' => 'required',

        ]);
        $img_name=time().rand().$request->image->getClientOriginalName();
        $request->image->move(public_path('image/projects'),$img_name);

        Project::create([

            'name' => $request->name,
            'client' => $request->client,
            'category' => $request->category,
            'website' => $request->website,
            'image' => $img_name,
            'about_id' => $request->about_id,

        ]);
        return redirect()->route('admin.projects.index')->with('msg', 'Project added successfully')->with('type', 'success');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=Project::find($id);
        $services=About::select('title','id')->where('type','service2')->get();
        return view('admin.project.edit',compact('project','services'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'client' => 'required',
            'category' => 'required',
            'website' => 'required',
            'about_id' => 'required',
        ]);

        $project=Project::find($id);

        $img_name=$project->image;
        if($request->image){

        $img_name=time().rand().$request->image->getClientOriginalName();
        $request->image->move(public_path('image/projects'),$img_name);

        }

        $project->update([

            'name' => $request->name,
            'client' => $request->client,
            'category' => $request->category,
            'website' => $request->website,
            'image' => $img_name,
            'about_id' => $request->about_id,

        ]);
        return redirect()->route('admin.projects.index')->with('msg', 'Project Updated successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project=Project::find($id);
        $project->delete();
        File::delete(public_path('image/projects/'.$project->image));

        return redirect()->route('admin.projects.index')->with('msg', 'Project Deleted successfully')->with('type', 'danger');

    }
    public function trash()
    {
        $projects=Project::onlyTrashed()->get();
        return view('admin.project.trash',compact('projects'));
    }
    public function restore($id)
    {
        Project::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.projects.index')->with('msg', 'Project Restored successfully')->with('type', 'warning');

    }
    public function forcedelete($id)
    {
        Project::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.projects.index')->with('msg', 'Project Force Deleted successfully')->with('type', 'danger');

    }
}
