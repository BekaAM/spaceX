<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Team;
use App\Models\Messages;
use App\Models\Subscribe;
use App\Http\Requests\MessagesRequests;
use App\Http\Requests\SubscribeRequests;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use DB;
class PagesController extends Controller
{

    public function aprove()
    {
    return view('frontend.aprove');
    }
    public function index()
    {
        $About = About::where([['status', '=', '1'],['category', '=', '1'],])->orderby('id')->limit(1)->get();
        $Feauter = About::where([['status', '=', '1'],['category', '=', '3'],])->orderby('id')->limit(1)->get();
        $Service = Service::where('status', 1)->orderBy('order','ASC')->limit(3)->get();
        $Gallery = Gallery::where('status', 1)->orderBy('order','ASC')->limit(6)->get();
        return view('frontend.index')->with('About',$About)
        ->with('Service',$Service)->with('Feauter',$Feauter)
        ->with('Gallery',$Gallery);
        
        
    }
    public function about()
    {
        $Service = Service::where('status', 1)->orderBy('order','ASC')->limit(12)->get();
        $Team = Team::where('status', 1)->orderBy('order','ASC')->limit(12)->get();
        $About = About::where([['status', '=', '1'],['category', '=', '2'],])->orderby('id')->limit(1)->get();
        $Feauter = About::where([['status', '=', '1'],['category', '=', '3'],])->orderby('id')->limit(1)->get();
        $Gallery = Gallery::where('status', 1)->orderBy('order','ASC')->limit(6)->get();
    return view('frontend.about')->with('About',$About)->with('Feauter',$Feauter)
    ->with('Gallery',$Gallery)->with('Service',$Service)
    ->with('Team',$Team);
    ;
    }
    public function faq()
    {
        $Faq = Faq::where('status', 1)->orderBy('order','ASC')->get();
    return view('frontend.faq')->with('Faq',$Faq);
    }
    public function contact()
    {
    return view('frontend.contact');
    }

    public function createContact(MessagesRequests $request)
    {
        $Contact = new Messages;
        $Contact->name = $request->input('name');
        $Contact->lastname = $request->input('lastname');
        $Contact->phone = $request->input('phone');
        $Contact->email = $request->input('email');
        $Contact->description = $request->input('description');
       
        $Contact->save();


        return redirect()->back()->with('success', trans('general.contactMsg'));

    }

    public function createSubscribe(SubscribeRequests $request)
    {
        
        $Subscribe = new Subscribe;
        $Subscribe->email = $request->input('subscribe');
    
       
        $Subscribe->save();


        return redirect()->back()->with('successSubs', trans('general.subscribeCreated'));

    }
}
