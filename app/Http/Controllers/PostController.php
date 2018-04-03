<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Allorder;
use App\Media;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


use Validator;
use App\AjaxImage;

 
use Illuminate\Support\Facades\File;
  


class PostController extends Controller
{


    public function ShowAdd()
    {
        return View('post.add', ['data' => 'data']);
    }


    public function Add()
    {
        return View('post.add', ['data' => 'data']);
    }


    public function addPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

            if ($validator->passes()) 
            {
                $myid=  Auth::user();
                if ($request->ajax()) {
                $New = new Post;
                $New->user_id =  $myid->id;
                $New->title =   $request->title;
                $New->content = $request->content;
                $New->save();
                }
                return View('post.AddMedia', ['data' => $New->id]);
            }

    	return response()->json(['error'=>$validator->errors()->all()]);

    }


public function uploadmedia(Request $request)
{

        if ($request->hasFile('image')) 
        {
                
            $image = Input::file('image');
            $media_type = $image->getMimeType(); 
            $pieces = explode("/",$media_type);
            
            $myid=  Auth::user();
            if ($request->ajax()) 
            {
                $New = new Media;
                $New->user_id =  $myid->id;
                $New->post_id =   $request->input('post_id');
                $New->media_type = $pieces[0]; 
                $New->data_link = $image->hashName();
                $New->save();
            }

          //  if ($pieces[0]=='image'){ Storage::put('public/image',  $image);  }
        //    if ($pieces[0]=='video'){ Storage::put('public/video',  $image);  }
            if ($pieces[0]=='image')
            {
                 $image->move(public_path('/uploads/image'), $image->hashName()); 
            }
            if ($pieces[0]=='video')
            {
                $image->move(public_path('/uploads/videos'), $image->hashName()); 
            }
            
            
            

            
            
        
            

        
        //  return  $request->getClientOriginalName('image');
        //  return  $request->image->getClientOriginalName(); 
        $item = strval($request->input('post_id'));     
            return $item;      
        } // end if has file
            return 'nofile';

} // end function


 





    public function ajaxImageUploadPost(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      if ($validator->passes()) {

        $input = $request->all();
        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);

        AjaxImage::create($input);

        return response()->json(['success'=>'done']);
      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }










    
    public function PostById($id)
    {
        $data = Post::find($id);
        $medias = $data->media  ;
      // return $data ;
        return View('post.PostById', ['data' => $data,'medias' => $medias]);
     
        
   }
   
 
    public function ConfirmOrder(Request $request){
      //  return $request->all();
        $myid=  Auth::user();
         if ($request->ajax()) {
         $newOrder = new Allorder;
         $newOrder->user_id =  $myid->id;
     //    $newOrder->chef_id =  $request->chef_id;
         $newOrder->post_id    =  $request->post_id;

         $newOrder->order_time = $request->order_time  ;
         $newOrder->save();
          
           
          }
        

       // return view('post.orderBox');
    }


public function loadMore(Request $request){
    $posts =  DB::table('posts')->
    
    leftJoin('users', function($join)
    {
        $join->on('users.id', '=', 'posts.user_id');

    })
 

    ->leftJoin('allorders', function($join)
    {
        $join->on('posts.id', '=', 'allorders.post_id');

    })
    ->select(
    'users.id as users_id',
    'users.name as users_name',
    'users.profilePic as users_profilePic',

    'posts.id as posts_post_id',
    'posts.user_id as posts_user_id',
    'posts.title as posts_title',
    'posts.content as posts_content',

    'allorders.user_id as allorders_user_id', 
    'allorders.order_status as allorders_order_status',
    'allorders.post_id as allorders_post_id'

    

)




  //  $users = DB::table('users')->select('email as user_email')
    
    ->paginate(3);
 
            if ($request->ajax()) {
            return view('post.ajax',['posts' => $posts]);
            }
            return view('post.index',compact('posts'));  
    }
 
     
    public function index()
    {
        $data = Post::all();
        return view('post/index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $url = Storage::url('v.jpg');
       // return Storage::files('public');
     //  return "<img src= '".$url."'/>";
     $url =  asset('storage/file.txt');
     
     
      return ?> <img src=   <?php echo $url ?>    /> <?php ;

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
