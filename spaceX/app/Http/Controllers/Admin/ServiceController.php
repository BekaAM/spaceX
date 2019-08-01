<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Validator;
use Response;
use App\Http\Requests\ServiceRequests;
use Yajra\Datatables\Datatables;
use DB;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddNewService()
    {
        $Service = Service::orderBy('order','ASC')->get();
                     
        return view('Admin.Service.add-new-service',compact('Service'));
       
    
    }

    public function ServiceData()
{                       
      $Services = Service::orderBy('order','ASC')->get();
     
      return Datatables::of($Services)->addColumn('EditDelete', ' 
      
      
      
   
<div style="margin-left:10%; margin-right:10%;" class="btn-group  btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
<button type="button"   data-toggle="modal" data-target="#myModalShow{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:blue;">remove_red_eye</i>

</button>                
<button type="button"   data-toggle="modal" data-target="#myModal{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:black;">edit</i>

</button>



<a  href="ServiceDelete/{{$id}}" class="btn btn-white">
<i style="color:red;" class="material-icons">delete</i>
</a>


</div>

')->addColumn('action', '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')
      ->addColumn('arrows','<i  class="material-icons">gamepad</i>')->addColumn('active','@if (1 ==  ($status))<i  class="material-icons">visibility</i> <p style="color:green; display:inline;"> @lang("general.public")  </p> @endif @if(0 ==  ($status))<i  class="material-icons">visibility_off</i><p style="display:inline; color:red;"> @lang("general.privat")  </p>@endif')->rawColumns(['EditDelete','action','arrows','active'])->make(true);
}

public function CreateService(ServiceRequests $request)
    {
        $Services = new Service;
        $Services->title = $request->input('title');
        $Services->status = $request->input('status');
        $Services->description = $request->input('description');
        $Services->class = $request->input('class');
        
    
        $Services->save();


        return redirect()->back()->with('success', trans('general.serviceCreated'));

    }
    public function ServiceUpdated(ServiceRequests $request,$id)
    {
        if( $Services = Service::find($id) ){
            $Services->title = $request->input('title');
            $Services->status = $request->input('status');
            $Services->description = $request->input('description');
            $Services->class = $request->input('class');
            

        $Services->save();


        return redirect()->back()->with('success', trans('general.serviceUpdated'));
        
    }
    else{

        return redirect()->back();
    }

    }

    //-sort
    function multiServiceAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
              
                $student = Service::whereIn('id', $ids);
                if($student->delete())
                {
                    return redirect()->back()->with('success', trans('general.dataDeleted')); //trans('general.chooseElements')

                }

            }else if( in_array($action, [0,1]) ){
        
                $student = Service::whereIn('id', $ids)->update(['status' =>  $action]);
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
    public function ServiceDelete($id){
        if( $Delete = Service::find($id)){
          $Delete->delete();
       
                return redirect()->back()->with('success', trans('general.dataDeleted'));
         
        }
        else{
    
            return redirect()->back()->with('error', trans('general.ChooseElement')); 
        }
        
             }
    public function ServiceUpdateOrder(Request $request)
    {
        $Services = Service::all();

        foreach ($Services as $item) {
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
    //--sort

}
