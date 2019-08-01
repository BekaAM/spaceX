<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use Validator;
use Response;


use Yajra\Datatables\Datatables;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function User()
    {
        $User = User::orderBy('order','ASC')->get();
             
        return view('Admin.Role.user',compact('User'));
    
    }
    
    public function userData()
{                       
      $Users = User::orderBy('order','ASC')->get();
     
      return Datatables::of($Users)->addColumn('EditDelete', ' 
      
      
      
   
<div style="margin-left:10%; margin-right:10%;" class="btn-group  btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
                  




<a  href="UserDelete/{{$id}}" class="btn btn-white">
<i style="color:red;" class="material-icons">delete</i>
</a>


</div>

')->addColumn('action', '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')
      ->addColumn('arrows','<i  class="material-icons">gamepad</i>')->addColumn('active','@if (1 ==  ($status))<i  class="material-icons">verified_user</i> <p style="color:green; display:inline;"> @lang("general.admin")  </p> @endif @if(0 ==  ($status))<p style="display:inline; color:red;"> @lang("general.process")  </p>@endif')->rawColumns(['EditDelete','action','arrows','active'])->make(true);
}

    
//-edit

 
 public function UserDelete($id){
    if( $Delete = User::find($id)){
      
        $Delete->delete();
       
            return redirect()->back()->with('success', trans('general.dataDeleted'));
     
    }
    else{

        return redirect()->back()->with('error', trans('general.ChooseElement')); 
    }
    
         }
//multidelete
function multiUserAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
               
                $student = User::whereIn('id', $ids);
                if($student->delete())
                {
                    return redirect()->back()->with('success', trans('general.dataDeleted')); //trans('general.chooseElements')

                }

            }else if( in_array($action, [0,1]) ){
        
                $student = User::whereIn('id', $ids)->update(['status' =>  $action]);
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
    public function UserUpdateOrder(Request $request)
    {
        $User = User::all();

        foreach ($User as $item) {
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
