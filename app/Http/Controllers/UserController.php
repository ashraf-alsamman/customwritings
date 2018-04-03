<?php

namespace App\Http\Controllers;
use App\User;
use App\Allorder;

use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
//use Yajra\Datatables\Facades\Datatables;

class UserController extends Controller
{

    public function index()
    {
        return view ('admin.user.index');
    }


        
     public function Chefs(Request $request)
    {

         $data =  DB::table('users')->where('user_type', '=',1 )->paginate(1);
        if ($request->ajax()) 
        {
            return view('user/ChefsAjax',['data' => $data]);
        }
        return view ('user.chefs');
    }


    public function ChefById($id,Request $request)
    {

     $data  = User::find($id);
     $posts =  DB::table('posts')->where('user_id', '=',$id )->paginate(2);
           if ($request->ajax()) 
           {
               return view('user/UserPostsAjax',['posts' => $posts]);
           }
    // return $data ;
   return View('user.ChefById', ['data' => $data,'posts' => $posts]);
        
    }

    
    public function myOrders(Request $request)
    {
       
        $user = Auth::User();
        $data =  DB::table('users')->where('allorders.user_id', '=', $user->id )
        ->rightJoin('allorders', function($join)
        {
            $join->on('allorders.chef_id', '=', 'users.id');
    
        })->paginate(2);
   
        if ($request->ajax()) {
            return view('user/myOrdersAjax',['data' => $data]);
          }


      return view('user/myOrders',['data' => $data]);
    }
    
     public function CancelMyOrder (Request $request)
    {
  
         if ($request->ajax()) {

            $nerd = Allorder::find($request->data_id);
            $nerd->order_status  = 2;
            $nerd->save();


        }
        
    }


 




    public function dataTable ()
    {
    return Datatables::eloquent(User::query())->make(true);
    }
 
 










}

