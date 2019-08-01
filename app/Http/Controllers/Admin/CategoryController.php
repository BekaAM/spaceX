<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryPost;
use Validator;
use Response;
use App\Http\Requests\CategoryRequests;

use Yajra\Datatables\Datatables;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddNewCategory()
    {
        $Category = Category::orderBy('order','ASC')->get();
                     
        return view('Admin.Blog.add-new-category',compact('Category'));
    
    }
    
    public function categoryData()
{                       
      $categories = Category::orderBy('order','ASC')->get();
     
      return Datatables::of($categories)->addColumn('EditDelete', ' 
      
      
      
   
<div style="margin-left:10%; margin-right:10%;" class="btn-group  btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
                  
<button type="button"   data-toggle="modal" data-target="#myModal{{$id}}" class="btn btn-white active-light">

<i class="material-icons" style="color:black;">edit</i>

</button>



<a  href="CategoryDelete/{{$id}}" class="btn btn-white">
<i style="color:red;" class="material-icons">delete</i>
</a>


</div>

')->addColumn('action', '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')
      ->addColumn('arrows','<i  class="material-icons">gamepad</i>')->addColumn('active','@if (1 ==  ($status))<i  class="material-icons">visibility</i> <p style="color:green; display:inline;"> @lang("general.public")  </p> @endif @if(0 ==  ($status))<i  class="material-icons">visibility_off</i><p style="display:inline; color:red;"> @lang("general.privat")  </p>@endif')->rawColumns(['EditDelete','action','arrows','active'])->make(true);
}

    public function Addcategory(CategoryRequests $request)
    {
       foreach($request->category_name as $index => $id ){




           $Category = new Category ;
           $Category->category_name = $id;
    
      
           $Category->save();
           }
  
       return redirect()->back()->with('success', trans('general.categoryCreated'));
    }
//-edit
public function CategoryUpdate(request $request,$id){ 
    $this->validate($request, [
        'category_name'=>'required|unique:categories,category_name|max:56',
        'status'=>'required',
    ]);
    $Category = Category::find($id);
    $Category->category_name = $request->input('category_name');
    $Category->status = $request->input('status');
    $Category->save();
    return redirect()->back()->with('success', trans('general.alertUpdate'));
 }
 //-delete
 public function CategoryDelete($id){
    if( $Delete = Category::find($id)){
      
        $Delete->delete();
         if( $Delete = CategoryPost::where('blog_category',$id)){
      
            $Delete->delete();
            return redirect()->back()->with('success', trans('general.dataDeleted'));
        }
    }
    else{

        return redirect()->back()->with('error', trans('general.ChooseElement')); 
    }
    
         }
//multidelete
function multiCategoryAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
                foreach( $ids as $deleteids ){
                    $Delete = CategoryPost::where('blog_category','=',$deleteids);
                  
                     $Delete->Delete();
                }
                $student = Category::whereIn('id', $ids);
                if($student->delete())
                {
                    return redirect()->back()->with('success', trans('general.dataDeleted')); //trans('general.chooseElements')

                }

            }else if( in_array($action, [0,1]) ){
        
                $student = Category::whereIn('id', $ids)->update(['status' =>  $action]);
                if($student)
                {
                    return redirect()->back()->with('success', trans('general.actionCompleted')); //trans('general.chooseElements')

                }
            }
              
            /* else if( $action == 2 ){
        
                $student = User::whereIn('id', $ids)->update(['active' =>  1]);
                if($student)
                {
                    return redirect()->back()->with('msg', 'Updated'); //trans('general.chooseElements')

                }
            }else if( $action == 6 ){
        
                $student = User::whereIn('id', $ids)->update(['active' =>  0]);
                if($student)
                {
                    return redirect()->back()->with('msg', 'Updated'); //trans('general.chooseElements')

                } 
                */
           else{
                
                return redirect()->back()->with('error', trans('general.ChooseAction'));

            }
        }else{
            return redirect()->back()->with('error', trans('general.ChooseElement')); 

        }
    }


    //-sort
    public function categoryUpdateOrder(Request $request)
    {
        $Category = Category::all();

        foreach ($Category as $item) {
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
