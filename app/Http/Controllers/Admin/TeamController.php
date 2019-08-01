<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Validator;
use Response;
use App\Http\Requests\TeamRequests;
use Yajra\Datatables\Datatables;
use DB;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddNewTeam()
    {
        $Team = Team::orderBy('order','ASC')->get();
                     
        return view('Admin.Team.add-new-team',compact('Team'));
       
    
    }

    public function teamData()
{                       
      $Teams = Team::orderBy('order','ASC')->get();
     
      return Datatables::of($Teams)->addColumn('EditDelete', ' 
      
      
      
   
<div style="margin-left:10%; margin-right:10%;" class="btn-group  btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
<button type="button"   data-toggle="modal" data-target="#myModalShow{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:blue;">remove_red_eye</i>

</button>                
<button type="button"   data-toggle="modal" data-target="#myModal{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:black;">edit</i>

</button>



<a  href="TeamDelete/{{$id}}" class="btn btn-white">
<i style="color:red;" class="material-icons">delete</i>
</a>


</div>

')->addColumn('action', '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')
      ->addColumn('arrows','<i  class="material-icons">gamepad</i>')->addColumn('active','@if (1 ==  ($status))<i  class="material-icons">visibility</i> <p style="color:green; display:inline;"> @lang("general.public")  </p> @endif @if(0 ==  ($status))<i  class="material-icons">visibility_off</i><p style="display:inline; color:red;"> @lang("general.privat")  </p>@endif')->rawColumns(['EditDelete','action','arrows','active'])->make(true);
}

public function CreateTeam(TeamRequests $request)
    {
        $Teams = new Team;
        $Teams->name = $request->input('name');
        $Teams->status = $request->input('status');
        $Teams->lastname = $request->input('lastname');
        $Teams->profession = $request->input('profession');
        
        $Teams->cover_images = $request->input('cover_images');
     //   $Teams->description = $request->input('description');
        $Teams->url_facebook = $request->input('url_facebook');
        $Teams->url_gmail = $request->input('url_gmail');
        $Teams->url_twitter = $request->input('url_twitter');
        $Teams->save();


        return redirect()->back()->with('success', trans('general.teamCreated'));

    }
    public function TeamUpdated(TeamRequests $request,$id)
    {
        if( $Teams = Team::find($id) ){
        
        $Teams->name = $request->input('name');
        $Teams->status = $request->input('status');
        $Teams->lastname = $request->input('lastname');
        $Teams->profession = $request->input('profession');
        
        $Teams->cover_images = $request->input('cover_images');
       // $Teams->description = $request->input('description');
        $Teams->url_facebook = $request->input('url_facebook');
        $Teams->url_gmail = $request->input('url_gmail');
        $Teams->url_twitter = $request->input('url_twitter');
        $Teams->save();


        return redirect()->back()->with('success', trans('general.teamUpdated'));
        
    }
    else{

        return redirect()->back();
    }

    }

    //-sort
    function multiTeamAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
              
                $student = Team::whereIn('id', $ids);
                if($student->delete())
                {
                    return redirect()->back()->with('success', trans('general.dataDeleted')); //trans('general.chooseElements')

                }

            }else if( in_array($action, [0,1]) ){
        
                $student = Team::whereIn('id', $ids)->update(['status' =>  $action]);
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
    public function TeamDelete($id){
        if( $Delete = Team::find($id)){
          $Delete->delete();
       
                return redirect()->back()->with('success', trans('general.dataDeleted'));
         
        }
        else{
    
            return redirect()->back()->with('error', trans('general.ChooseElement')); 
        }
        
             }
    public function teamUpdateOrder(Request $request)
    {
        $Teams = Team::all();

        foreach ($Teams as $item) {
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
