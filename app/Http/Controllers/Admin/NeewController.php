<?php

namespace App\Http\Controllers\Admin;

use App\Models\Neew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class NeewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neews=Neew::all();
        return view('admin.neew.index',compact('neews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.neew.create');

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
            'title' => 'required',
            'date' => 'required',
            'image' => 'required',
            'content' => 'required',

        ]);
        $img_name=time().rand().$request->image->getClientOriginalName();
        $request->image->move(public_path('image/neews'),$img_name);

        Neew::create([

            'title' => $request->title,
            'date' => $request->date,
            'image' => $img_name,
            'content' => $request->content,

        ]);
        return redirect()->route('admin.neews.index')->with('msg', 'Neew added successfully')->with('type', 'success');


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
        $neew=Neew::find($id);
        return view('admin.neew.edit',compact('neew'));

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
            'title' => 'required',
            'date' => 'required',
            'content' => 'required',
        ]);

        $neew=Neew::find($id);

        $img_name=$neew->image;
        if($request->image){

        $img_name=time().rand().$request->image->getClientOriginalName();
        $request->image->move(public_path('image/neews'),$img_name);

        }

        $neew->update([

            'image' => $img_name,
            'title' => $request->title,
            'date' => $request->date,
            'content' => $request->content,

        ]);
        return redirect()->route('admin.neews.index')->with('msg', 'Neew Updated successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $neew=Neew::find($id);
        $neew->delete();
        File::delete(public_path('image/neews/'.$neew->image));

        return redirect()->route('admin.neews.index')->with('msg', 'Neew Deleted successfully')->with('type', 'danger');

    }
    public function trash()
    {
        $neews=Neew::onlyTrashed()->get();
        return view('admin.neew.trash',compact('neews'));
    }
    public function restore($id)
    {
        Neew::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.neews.index')->with('msg', 'Neew Restored successfully')->with('type', 'warning');

    }
    public function forcedelete($id)
    {
        Neew::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.neews.index')->with('msg', 'Neew Force Deleted successfully')->with('type', 'danger');

    }
}

