<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Information;

use Validator;
use Response;
use App\Http\Requests\InformationRequests;

use Yajra\Datatables\Datatables;
use DB;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddNewInformation()
    {
        $Information = Information::orderBy('order','ASC')->get();
                     
        return view('Admin.Information.add-new-information',compact('Information'));
    
    }
    
    public function InformationData()
{                       
      $Informations = Information::orderBy('order','ASC')->get();
     
      return Datatables::of($Informations)->addColumn('EditDelete', ' 
      
      
      
   
<div style="margin-left:10%; margin-right:10%;" class="btn-group  btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
                  
<button type="button"   data-toggle="modal" data-target="#myModal{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:black;">edit</i>

</button>



<a  href="InformationDelete/{{$id}}" class="btn btn-white">
<i style="color:red;" class="material-icons">delete</i>
</a>


</div>

')->addColumn('action', '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')
->addColumn('category', '
@if (1 ==  ($category)) @lang("general.webName") @endif 
@if (2 ==  ($category)) @lang("general.urlMap") @endif 
@if (3 ==  ($category)) @lang("general.urlGmail") @endif 
@if (4 ==  ($category)) @lang("general.urlInstagram") @endif 
@if (5 ==  ($category)) @lang("general.urlFacebook") @endif 
@if (6 ==  ($category)) @lang("general.urlTwitter") @endif 
@if (7 ==  ($category)) @lang("general.phone") @endif 
')
      ->addColumn('arrows','<i  class="material-icons">gamepad</i>')->addColumn('active','@if (1 ==  ($status))<i  class="material-icons">visibility</i> <p style="color:green; display:inline;"> @lang("general.public")  </p> @endif @if(0 ==  ($status))<i  class="material-icons">visibility_off</i><p style="display:inline; color:red;"> @lang("general.privat")  </p>@endif')->rawColumns(['category','EditDelete','action','arrows','active'])->make(true);
}

    public function createInformation(InformationRequests $request)
    {
       foreach($request->category as $index => $id ){




           $Information = new Information ;
           $Information->category = $id;
           $Information->content = $request->content[$index];
    
      
           $Information->save();
           }
  
       return redirect()->back()->with('success', trans('general.InformationCreated'));
    }
//-edit
public function InformationUpdated(request $request,$id){ 
    $this->validate($request, [
        'category'=>'required',
        'content'=>'required',
        'status'=>'required',
    ]);
    $Information = Information::find($id);
    $Information->category = $request->input('category');
    $Information->content = $request->input('content');
    $Information->status = $request->input('status');
    $Information->save();
    return redirect()->back()->with('success', trans('general.alertUpdate'));
 }
 //-delete
 public function InformationDelete($id){
    if( $Delete = Information::find($id)){
      
        $Delete->delete();
       
            return redirect()->back()->with('success', trans('general.dataDeleted'));
     
    }
    else{

        return redirect()->back()->with('error', trans('general.ChooseElement')); 
    }
    
         }
//multidelete
function multiInformationAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
               
                $student = Information::whereIn('id', $ids);
                if($student->delete())
                {
                    return redirect()->back()->with('success', trans('general.dataDeleted')); //trans('general.chooseElements')

                }

            }else if( in_array($action, [0,1]) ){
        
                $student = Information::whereIn('id', $ids)->update(['status' =>  $action]);
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


    //-sort
    public function InformationUpdateOrder(Request $request)
    {
        $Information = Information::all();

        foreach ($Information as $item) {
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
