<?php

namespace App\Http\Controllers\Site;

use App\Models\Neew;
use App\Mail\Contact;
use App\Models\About;
use App\Models\Proces;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\cheakCount;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    public function index()
    {
        $abouts=About::where('type','about')->get();
        $proces=Proces::all();
        $services1=About::where('type','service1')->get();
        $services2=About::where('type','service2')->get();
        $projects=Project::all();
        $testimonials=Testimonial::all();
        $news=Neew::all();
        return view('site.index',compact('abouts','proces','services1','services2'
    ,'projects','testimonials','news'));
    }
    public function about()
    {
        $proces=Proces::all();
        $testimonials=Testimonial::all();
        $news=Neew::all();
        return view('site.about',compact('proces','testimonials','news'));
    }
    public function service()
    {
        $proces=Proces::all();
        $services1=About::where('type','service1')->get();
        $services2=About::where('type','service2')->get();

        return view('site.service',compact('proces','services1','services2'));
    }
    public function pricing()
    {
        $testimonials=Testimonial::all();

        return view('site.pricing',compact('testimonials'));
    }
    public function project()
    {
        $proces=Proces::all();
        $projects=Project::all();

        return view('site.project',compact('proces','projects'));
    }
    public function contact()
    {
        return view('site.contact');
    }
    public function single_project($id)
    {
        $project=Project::find($id);
        return view('site.single-project',compact('project'));

    }
    public function contact_data(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'phone'=>'required',
            'message'=>['required',new cheakCount(5)]

        ]);
        $data=$request->except('_token','submit');

        Mail::to('bassharr.2004@gmail.com')->send(new Contact($data));
    }


}
