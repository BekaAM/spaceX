<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messages;
use Validator;
use Response;

use Yajra\Datatables\Datatables;
use DB;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddNewMessages()
    {
        $Messages = Messages::orderBy('order','ASC')->get();
                     
        return view('Admin.Messages.add-new-messages',compact('Messages'));
       
    
    }

    public function messagesData()
{                       
      $Messagess = Messages::orderBy('order','ASC')->get();
     
      return Datatables::of($Messagess)->addColumn('EditDelete', ' 
      
      
      
   
<div style="margin-left:10%; margin-right:10%;" class="btn-group  btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
             

<button type="button"   data-toggle="modal" data-target="#myModalShow{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:blue;">remove_red_eye</i>

</button>  


<a  href="MessagesDelete/{{$id}}" class="btn btn-white">
<i style="color:red;" class="material-icons">delete</i>
</a>


</div>

')->addColumn('action', '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')
      ->addColumn('arrows','<i  class="material-icons">gamepad</i>')->rawColumns(['EditDelete','action','arrows'])->make(true);
}



    //-sort
    function multiMessagesAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
              
                $student = Messages::whereIn('id', $ids);
                if($student->delete())
                {
                    return redirect()->back()->with('success', trans('general.dataDeleted')); //trans('general.chooseElements')

                }

            }
       
       else{
                
                return redirect()->back()->with('error', trans('general.ChooseAction'));

            }
        }else{
            return redirect()->back()->with('error', trans('general.ChooseElement')); 

        }
    }
    public function MessagesDelete($id){
        if( $Delete = Messages::find($id)){
          $Delete->delete();
       
                return redirect()->back()->with('success', trans('general.dataDeleted'));
         
        }
        else{
    
            return redirect()->back()->with('error', trans('general.ChooseElement')); 
        }
        
             }
    public function messagesUpdateOrder(Request $request)
    {
        $Messagess = Messages::all();

        foreach ($Messagess as $item) {
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
