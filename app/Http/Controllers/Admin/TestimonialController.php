<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials=Testimonial::all();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');

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
            'name' => 'required',
            'comment' => 'required',
            'job' => 'required',

        ]);
        $img_name=time().rand().$request->image->getClientOriginalName();
        $request->image->move(public_path('image/testimonials'),$img_name);

        Testimonial::create([

            'image' => $img_name,
            'name' => $request->name,
            'comment' => $request->comment,
            'job' => $request->job,

        ]);
        return redirect()->route('admin.testimonials.index')->with('msg', 'Testimonial added successfully')->with('type', 'success');


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
        $testimonial=Testimonial::find($id);
        return view('admin.testimonial.edit',compact('testimonial'));

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
            'comment' => 'required',
            'job' => 'required',
        ]);

        $testimonial=Testimonial::find($id);

        $img_name=$testimonial->image;
        if($request->image){

        $img_name=time().rand().$request->image->getClientOriginalName();
        $request->image->move(public_path('image/testimonials'),$img_name);

        }

        $testimonial->update([

            'image' => $img_name,
            'name' => $request->name,
            'comment' => $request->comment,
            'job' => $request->job,

        ]);
        return redirect()->route('admin.testimonials.index')->with('msg', 'Testimonial Updated successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial=Testimonial::find($id);
        $testimonial->delete();
        File::delete(public_path('image/testimonials/'.$testimonial->image));

        return redirect()->route('admin.testimonials.index')->with('msg', 'Testimonial Deleted successfully')->with('type', 'danger');

    }
    public function trash()
    {
        $testimonials=Testimonial::onlyTrashed()->get();
        return view('admin.testimonial.trash',compact('testimonials'));
    }
    public function restore($id)
    {
        Testimonial::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.testimonials.index')->with('msg', 'Testimonial Restored successfully')->with('type', 'warning');

    }
    public function forcedelete($id)
    {
        Testimonial::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.testimonials.index')->with('msg', 'Testimonial Force Deleted successfully')->with('type', 'danger');

    }
}

