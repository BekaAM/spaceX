<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\CategoryPost;
use Validator;
use Response;
use App\Http\Requests\PostRequests;
use Yajra\Datatables\Datatables;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddNewPost()
    {
        $Category = Category::where('status','1')->orderBy('order','ASC')->get();
    return view('Admin.Blog.add-new-post')->with('Category', $Category);
    }
    public function TablePost()
    {
        $Post = Post::all();
                     
        return view('Admin.Blog.table-post',compact('Post'));
    
    }
    public function PostEdit($id)
      {
        $CategoryPost = CategoryPost::where('posts_id',$id)->get();
    
  
      $Category = Category::where('status','1')->orderBy('order','ASC')->get();
    if($post = Post::find($id)){

        return view('admin.blog.edit-post')->with('post', $post)->with('Category', $Category)->with('CategoryPost', $CategoryPost);

       } else
       {

        return redirect()->back();
       }
    
}
public function searchPost(Request $request)
{
        $searchTerm = $request->input('searchTerm');
        $Post = Post::orderBy('id')->search($searchTerm)->get();
        return view('admin.components-blog-posts')->with('Posts',$Post);
        
    
}

public function blogPosts(Request $request)
{
    
    $Post = Post::orderBy('id')->paginate(32);
    return view('admin.components-blog-posts')->with('Posts',$Post);

}
    public function postData()
    {                       
        $Post = Post::all();
         
          return Datatables::of($Post)->addColumn('EditDelete',
          
           '
           <div class="btn-group btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
                  
                     
                      <a href="PostEdit/{{$id}}" class="btn btn-white active-light"> 
                      <i class="material-icons" style="color:black;">edit</i>
                      </a>
                      <a href="/PostDelete/{{$id}}"  class="btn btn-white">
                      <i style="color:red;" class="material-icons">delete</i>
                      </a>
                     
                    </div>
           ')->addColumn('action',
           '<input type="checkbox" name="ids[]" class="student_checkbox" value="{{$id}}" />')->addColumn('active',
           '@if (1 ==  ($visibility))<i  class="material-icons">visibility</i> <p style="color:green; display:inline;"> @lang("general.public")  </p> @endif
            @if(0 ==  ($visibility))<i  class="material-icons">visibility_off</i><p style="display:inline; color:red;"> @lang("general.privat")  </p>@endif')
            ->rawColumns(['EditDelete','action','active'])->make(true);
    }

    public function PostDelete($id){
        if( $Delete = Post::find($id)){
      
        $Delete->delete();
        if( $Delete = CategoryPost::where('posts_id',$id)){
      
            $Delete->delete();
            return redirect()->back()->with('success', trans('general.dataDeleted'));
        }
    }
    
    else{

        return redirect()->back()->with('error', trans('general.ChooseElement')); 
    }
 }
 function multiPostAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');
   
   
        if(isset($ids) and is_array($ids) and $action != '')

        {
        
            if( $action == 'delete'){
                foreach( $ids as $deleteids ){
                    $Delete = CategoryPost::where('posts_id','=',$deleteids);
                  
                     $Delete->Delete();
                }
               
               
                $Delete->delete();

                $student = Post::whereIn('id', $ids);
              
                if($student->delete())
                {
                    
                    
                    return redirect()->back()->with('success', trans('general.dataDeleted')); //trans('general.chooseElements')

                }

            }else if( in_array($action, [0,1]) ){
        
                $student = Post::whereIn('id', $ids)->update(['visibility' =>  $action]);
                if($student)
                {
                    return redirect()->back()->with('success', trans('general.actionCompleted')); 

                }
            }
           
           else{
                
                return redirect()->back()->with('error', trans('general.ChooseAction'));

            }
        }else{
            return redirect()->back()->with('error', trans('general.ChooseElement')); 

        }
    }
    public function CreatePost(PostRequests $request)
    {
        $Posts = new Post;
        $Posts->title = $request->input('title');
        $Posts->content = $request->input('content');
        $Posts->cover_images = $request->input('cover_images');
        $Posts->visibility = $request->input('visibility');
        $Posts->save();

        foreach( $request->blog_category as $index => $id ){
            
         
            
       
            $Category = new CategoryPost ;
            $Category->blog_category = $id;
            $Category->posts_id = $Posts->id;
           
          
            $Category->save();
       }
        return redirect()->back()->with('success', trans('general.postCreated'));

    }

    public function PostUpdated(PostRequests $request,$id)
    {
        if( $Posts = Post::find($id) ){
        $Posts->title = $request->input('title');
        $Posts->content = $request->input('content');
        $Posts->cover_images = $request->input('cover_images');
        $Posts->visibility = $request->input('visibility');
        $Posts->save();
        //delete
        $Delete = CategoryPost::where('posts_id','=',$id);
        $Delete->delete();
         //insert updated 
        foreach( $request->blog_category as $index => $id ){
           $Category = new CategoryPost ;
            $Category->blog_category = $id;
            $Category->posts_id = $Posts->id;
            $Category->save();
       }
       return redirect('/table-post')->with('success', trans('general.alertUpdate'));
    }
    
else{

    return redirect()->back();
}
}
      
        
     
       
            
            
            
        
         
          
            
      
     
       
       

        
      
     
     
      

     



}
