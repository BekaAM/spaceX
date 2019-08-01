<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use App\Models\Messages;
use App\User;
use App\Post;
use App\Models\Subscribe;
class PagesController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function dashboard()
    {
      $Messages = Messages::count();
      $Service = Service::count();
      $About = About::count();
      $User = User::count();
      $Subscribe = Subscribe::count();
     
    return view('admin.index')->with('Messages',$Messages)
    ->with('Service',$Service)->with('User',$User)
    ->with('Subscribe',$Subscribe)->with('About',$About);
    }
   
   // public function userProfile()
  //  {
   // return view('admin.user-profile-lite');
   /// }
   // public function errors()
   // {
   // return view('admin.errors');
  //  }
  //  public function table()
  //  {
//return view('admin.table');
  //  }
  
}
