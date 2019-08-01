<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Validator;
use Response;

use Yajra\Datatables\Datatables;
use DB;

class SubscribeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddNewSubscribe()
    {
        $Subscribe = Subscribe::orderBy('order','ASC')->get();
                     
        return view('Admin.Subscribe.add-new-subscribe',compact('Subscribe'));
       
    
    }

    public function SubscribeData()
{                       
      $Subscribes = Subscribe::orderBy('order','ASC')->get();
     
      return Datatables::of($Subscribes)->addColumn('EditDelete', ' 
      
      
      
   
<div style="margin-left:10%; margin-right:10%;" class="btn-group  btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
             




<a  href="SubscribeDelete/{{$id}}" class="btn btn-white">
<i style="color:red;" class="material-icons">delete</i>
</a>


</div>

')->addColumn('action', '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')
      ->addColumn('arrows','<i  class="material-icons">gamepad</i>')->rawColumns(['EditDelete','action','arrows'])->make(true);
}



    //-sort
    function multiSubscribeAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
              
                $student = Subscribe::whereIn('id', $ids);
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
    public function SubscribeDelete($id){
        if( $Delete = Subscribe::find($id)){
          $Delete->delete();
       
                return redirect()->back()->with('success', trans('general.dataDeleted'));
         
        }
        else{
    
            return redirect()->back()->with('error', trans('general.ChooseElement')); 
        }
        
             }
    public function SubscribeUpdateOrder(Request $request)
    {
        $Subscribes = Subscribe::all();

        foreach ($Subscribes as $item) {
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
