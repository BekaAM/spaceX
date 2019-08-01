<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;

use Validator;
use Response;
use App\Http\Requests\FaqRequests;

use Yajra\Datatables\Datatables;
use DB;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddNewFaq()
    {
        $Faq = Faq::orderBy('order','ASC')->get();
                     
        return view('Admin.Faq.add-new-faq',compact('Faq'));
    
    }
    
    public function faqData()
{                       
      $faqs = Faq::orderBy('order','ASC')->get();
     
      return Datatables::of($faqs)->addColumn('EditDelete', ' 
      
      
      
   
<div style="margin-left:10%; margin-right:10%;" class="btn-group  btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
                  
<button type="button"   data-toggle="modal" data-target="#myModal{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:black;">edit</i>

</button>



<a  href="FaqDelete/{{$id}}" class="btn btn-white">
<i style="color:red;" class="material-icons">delete</i>
</a>


</div>

')->addColumn('action', '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')
      ->addColumn('arrows','<i  class="material-icons">gamepad</i>')->addColumn('active','@if (1 ==  ($status))<i  class="material-icons">visibility</i> <p style="color:green; display:inline;"> @lang("general.public")  </p> @endif @if(0 ==  ($status))<i  class="material-icons">visibility_off</i><p style="display:inline; color:red;"> @lang("general.privat")  </p>@endif')->rawColumns(['EditDelete','action','arrows','active'])->make(true);
}

    public function createFaq(FaqRequests $request)
    {
       foreach($request->question as $index => $id ){




           $Faq = new Faq ;
           $Faq->question = $id;
          
           $Faq->answers = $request->answers[$index];
    
      
           $Faq->save();
           }
  
       return redirect()->back()->with('success', trans('general.faqCreated'));
    }
//-edit
public function faqUpdated(request $request,$id){ 
    $this->validate($request, [
        'question'=>'required',
        'answers'=>'required',
        'status'=>'required',
    ]);
    $Faq = Faq::find($id);
    $Faq->question = $request->input('question');
    $Faq->answers = $request->input('answers');
    $Faq->status = $request->input('status');
    $Faq->save();
    return redirect()->back()->with('success', trans('general.alertUpdate'));
 }
 //-delete
 public function FaqDelete($id){
    if( $Delete = Faq::find($id)){
      
        $Delete->delete();
       
            return redirect()->back()->with('success', trans('general.dataDeleted'));
     
    }
    else{

        return redirect()->back()->with('error', trans('general.ChooseElement')); 
    }
    
         }
//multidelete
function multiFaqAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
               
                $student = Faq::whereIn('id', $ids);
                if($student->delete())
                {
                    return redirect()->back()->with('success', trans('general.dataDeleted')); //trans('general.chooseElements')

                }

            }else if( in_array($action, [0,1]) ){
        
                $student = Faq::whereIn('id', $ids)->update(['status' =>  $action]);
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
    public function faqUpdateOrder(Request $request)
    {
        $Faq = Faq::all();

        foreach ($Faq as $item) {
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
