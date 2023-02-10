<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:about-list|about-create|about-edit|about-delete', ['only' => ['index','store']]);
         $this->middleware('permission:about-create', ['only' => ['create','store']]);
         $this->middleware('permission:about-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:about-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts=About::paginate(10);
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');

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
            'icon' => 'required',
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',

        ]);

        About::create([

            'icon' => $request->icon,
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,

        ]);
        return redirect()->route('admin.abouts.index')->with('msg', 'About added successfully')->with('type', 'success');


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
        $about=About::find($id);
        return view('admin.about.edit',compact('about'));

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
            'icon' => 'required',
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',

        ]);

        $about=About::find($id);


        $about->update([

            'icon' => $request->icon,
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,

        ]);
        return redirect()->route('admin.abouts.index')->with('msg', 'About Updated successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=About::find($id);
        $about->delete();
        return redirect()->route('admin.abouts.index')->with('msg', 'About Deleted successfully')->with('type', 'danger');

    }
    public function trash()
    {
        $abouts=About::onlyTrashed()->get();
        return view('admin.about.trash',compact('abouts'));
    }
    public function restore($id)
    {
        About::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.abouts.index')->with('msg', 'About Restored successfully')->with('type', 'warning');

    }
    public function forcedelete($id)
    {
        About::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.abouts.index')->with('msg', 'About Force Deleted successfully')->with('type', 'danger');

    }
}
