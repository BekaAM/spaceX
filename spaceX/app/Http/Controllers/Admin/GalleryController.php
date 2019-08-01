<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

use Validator;
use Response;
use App\Http\Requests\GalleryRequests;

use Yajra\Datatables\Datatables;
use DB;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddNewGallery()
    {
        $Gallery = Gallery::orderBy('order','ASC')->get();
                     
        return view('Admin.Gallery.add-new-gallery',compact('Gallery'));
    
    }
    //<a href="#" class="show-modal btn btn-white active-light" data-id="{{$id}}"  data-filename="photos/gallery/{{$filename}}">
    //<i class="material-icons" style="color:black;">remove_red_eye</i>
      //      </a>
    public function GalleryData()
{                       
      $Gallerys = Gallery::orderBy('order','ASC')->get();
     
      return Datatables::of($Gallerys)->addColumn('EditDelete', ' 
      
      
      
   
<div style="margin-left:10%; margin-right:10%;" class="btn-group  btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
    



<button type="button"   data-toggle="modal" data-target="#myModal{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:black;">remove_red_eye</i>

</button>



<a  href="GalleryDelete/{{$id}}" class="btn btn-white">
<i style="color:red;" class="material-icons">delete</i>
</a>


</div>
<div class="modal fade" id="myModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang("general.show") @lang("general.gallery")</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
           
                @csrf
              <div class="modal-body">
                  
                  <img src="photos/gallery/{{$filename}}" class="img-fluid" >
                
                 
                   
              </div>
              <div class="modal-footer">
                </div>
            </div>
          </div>
        </div>

')->addColumn('action', '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')
      ->addColumn('arrows','<i  class="material-icons">gamepad</i>')->addColumn('active','@if (1 ==  ($status))<i  class="material-icons">visibility</i> <p style="color:green; display:inline;"> @lang("general.public")  </p> @endif @if(0 ==  ($status))<i  class="material-icons">visibility_off</i><p style="display:inline; color:red;"> @lang("general.privat")  </p>@endif')
      
      ->rawColumns(['EditDelete','action','arrows','active'])->make(true);
}

public function fileStore(Request $request)
{
    $image = $request->file('file');
    $imageName = $image->getClientOriginalName();
    $image->move(public_path('photos/gallery'),$imageName);
    
    $imageUpload = new Gallery();
    $imageUpload->filename = $imageName;
    $imageUpload->save();
    return response()->json(['success'=>$imageName]);
}
public function fileDestroy(Request $request)
{
    $filename =  $request->get('filename');
    Gallery::where('filename',$filename)->delete();
    $path=public_path().'/photos/gallery/'.$filename;
    if (file_exists($path)) {
        unlink($path);
    }
    return $filename;  
}
 //-delete
 public function GalleryDelete($id){
  
    
    if( $Delete = Gallery::find($id)){
        
        $select = Gallery::where('id', $id)->get();
             
 
foreach($select as $item)
          
        
          $path=public_path().'/photos/gallery/'.$item->filename;
          if (file_exists($path)) {
           unlink($path);
            }
        $Delete->delete();
       
            return redirect()->back()->with('success', trans('general.dataDeleted'));
     
    }
    else{

        return redirect()->back()->with('error', trans('general.ChooseElement')); 
    }
    
         }
//multidelete
function multiGalleryAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
                $select = Gallery::whereIn('id', $ids)->get();
             
                foreach($select as $item){

                      
                    
                      $path=public_path().'/photos/gallery/'.$item->filename;
                      if (file_exists($path)) {
                       unlink($path);
                        }
                }
                

             
                $student = Gallery::whereIn('id', $ids);
          
                if($student->delete())
                {
                  
                  
                    return redirect()->back()->with('success', trans('general.dataDeleted')); //trans('general.chooseElements')

                }

            }else if( in_array($action, [0,1]) ){
        
                $student = Gallery::whereIn('id', $ids)->update(['status' =>  $action]);
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
    public function GalleryUpdateOrder(Request $request)
    {
        $Gallery = Gallery::all();

        foreach ($Gallery as $item) {
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
