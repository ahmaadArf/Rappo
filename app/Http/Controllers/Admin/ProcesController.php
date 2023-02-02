<?php

namespace App\Http\Controllers\Admin;

use App\Models\Proces;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proces=Proces::all();
        return view('admin.proces.index',compact('proces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proces.create');

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
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $img_name=time().rand().$request->image->getClientOriginalName();
        $request->image->move(public_path('image/proces'),$img_name);

        Proces::create([

            'image' => $img_name,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('admin.proces.index')->with('msg', 'Proces added successfully')->with('type', 'success');


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
        $proces=Proces::find($id);
        return view('admin.proces.edit',compact('proces'));

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
            'content' => 'required',

        ]);

        $proces=Proces::find($id);

        $img_name=$proces->image;
        if($request->image){

        $img_name=time().rand().$request->image->getClientOriginalName();
        $request->image->move(public_path('image/proces'),$img_name);

        }


        $proces->update([

            'image' => $img_name,
            'title' => $request->title,
            'content' => $request->content,

        ]);
        return redirect()->route('admin.proces.index')->with('msg', 'Proces Updated successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proces=Proces::find($id);
        $proces->delete();
        File::delete(public_path('image/proces/'.$proces->image));
        return redirect()->route('admin.proces.index')->with('msg', 'Proces Deleted successfully')->with('type', 'danger');

    }
    public function trash()
    {
        $proces=Proces::onlyTrashed()->get();
        return view('admin.proces.trash',compact('proces'));
    }
    public function restore($id)
    {
        Proces::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.proces.index')->with('msg', 'Proces Restored successfully')->with('type', 'warning');

    }
    public function forcedelete($id)
    {
        Proces::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.proces.index')->with('msg', 'Proces Force Deleted successfully')->with('type', 'danger');

    }
}
