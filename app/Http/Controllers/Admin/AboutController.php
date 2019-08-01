<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use Validator;
use Response;
use App\Http\Requests\AboutRequests;
use Yajra\Datatables\Datatables;
use DB;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddNewAbout()
    {
        $About = About::orderBy('order','ASC')->get();
                     
        return view('Admin.About.add-new-About',compact('About'));
       
    
    }

    public function aboutData()
{                       
      $About = About::orderBy('order','ASC')->get();
     
      return Datatables::of($About)->addColumn('EditDelete', ' 
      
      
      
   
<div style="" class="btn-group  btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
<button type="button"   data-toggle="modal" data-target="#myModalShow{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:blue;">remove_red_eye</i>

</button>                
<button type="button"   data-toggle="modal" data-target="#myModal{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:black;">edit</i>

</button>



<a  href="AboutDelete/{{$id}}" class="btn btn-white">
<i style="color:red;" class="material-icons">delete</i>
</a>


</div>

')->addColumn('action', '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')
->addColumn('category', '@if(1 ==($category))@lang("general.banner") @endif @if(2 ==($category))@lang("general.aboutUs") @endif @if(3 ==($category))@lang("general.feature") @endif')
->addColumn('arrows','<i  class="material-icons">gamepad</i>')->addColumn('active','@if (1 ==  ($status))<i  class="material-icons">visibility</i> <p style="color:green; display:inline;"> @lang("general.public")  </p> @endif @if(0 ==  ($status))<i  class="material-icons">visibility_off</i><p style="display:inline; color:red;"> @lang("general.privat")  </p>@endif')
->rawColumns(['EditDelete','category','action','arrows','active'])->make(true);
}

public function createAbout(AboutRequests $request)
    {
        $About = new About;
        $About->title = $request->input('title');
        $About->description = $request->input('description');
        $About->cover_images = $request->input('cover_images');
        $About->category = $request->input('category');
        $About->status = $request->input('status');
        $About->save();


        return redirect()->back()->with('success', trans('general.aboutCreated'));

    }
    public function aboutUpdated(AboutRequests $request,$id)
    {
        if( $About = About::find($id) ){
        
        $About->title = $request->input('title');
        $About->description = $request->input('description');
        $About->cover_images = $request->input('cover_images');
        $About->category = $request->input('category');
        $About->status = $request->input('status');
        $About->save();


        return redirect()->back()->with('success', trans('general.aboutUpdated'));
        
    }
    else{

        return redirect()->back();
    }

    }

    //-sort
    function multiAboutAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
              
                $student = About::whereIn('id', $ids);
                if($student->delete())
                {
                    return redirect()->back()->with('success', trans('general.dataDeleted')); //trans('general.chooseElements')

                }

            }else if( in_array($action, [0,1]) ){
        
                $student = About::whereIn('id', $ids)->update(['status' =>  $action]);
                if($student)
                {
                    return redirect()->back()->with('success', trans('general.actionCompleted')); //trans('general.chooseElements')

                }
            }
       else{
                
                return redirect()->back()->with('error', trans('general.ChooseAction'));

            }
        }else{
            return redirect()->back()->with('error', trans('general.ChooseElement')); 

        }
    }
    public function AboutDelete($id){
        if( $Delete = About::find($id)){
          $Delete->delete();
       
                return redirect()->back()->with('success', trans('general.dataDeleted'));
         
        }
        else{
    
            return redirect()->back()->with('error', trans('general.ChooseElement')); 
        }
        
             }
             public function aboutUpdateOrder(Request $request)
             {
                 $About = About::all();
         
                 foreach ($About as $item) {
                     $item->timestamps = false; // To disable update_at field updation
                     $id = $item->id;
         
                     foreach ($request->order as $order) {
                         if ($order['id'] == $id) {
                             $item->update(['order' => $order['position']]);
                         }
                     }
                 }
                 
                 return response('Update Successfully.', 200);
             }

}
