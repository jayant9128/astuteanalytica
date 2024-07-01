<?php

namespace App\Http\Controllers\masterAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use Hash;
use DB;
use Input;

class RegistrationController extends Controller
{
    /*Level 1*/
    public function index(Request $request)
    {
       // return $request;
       $user['user']= User::where('user_role','PUBLISHER')->get();
       return view('masters.registration.list',compact('user'),$user);
        
    }
    
    public function categoryTypeSearch(Request $request)
    {
        Session::put('cate_level', 1);
        Session::save();
        $category_type = $request->category_type;
        $data['category_data'] = Category::where('parent_id',0)->where('category_type', $category_type)->get();
        $page_title = "Categories List - Astute Analytica";
        return view('masters.category.category',compact('page_title'),$data);
    }
    
    
    public function registeruser(Request $request)
    {
       
       $page_title = "Add User - Astute Analytica";
       return view('masters.registration.add_category',compact('page_title'));
    }
    
    public function registeruserstore(Request $request)
    {
      // $input = $request->all();
   
        //dd($input);
        $this->validate($request , array
         (    
             'email' => 'unique:users',
             'name' => 'required',
             'lname' => 'required',
             'password' => 'required',
         )); 
         $input['name']=$request->name.','.$request->lname;
         $input['email']=$request->email;
         $input['password']=Hash::make($request->password);
         $input['is_active']=$request->is_active;
         $input['remember_token']=$request->_token;
         $input['user_role']='PUBLISHER';
      
         User::insert($input);
            $request->session()->flash('alert-success','User has been sucessfully added.');
            return Redirect::back();
    }
       
       
    public function category_update(Request $request,$user_edit)
    {
      //  return $user_edit;
      $data['user'] = User::where('id',$user_edit)->get();
      $page_title = "Edit User - Astute Analytica";
      return view('masters.registration.edit_category',compact('page_title'),$data);
    }
   // status_update

    public function status_update(Request $request)
    {

        $input['is_active'] = $request->is_active;
      $category_id = $request->email;
    
         $this->validate($request , array
         (   
             'email' => 'required'
         ));
    // return $request;
       User::where('email',$category_id)->update($input);

        $request->session()->flash('alert-success','User has been sucessfully updated.');
        return redirect()->back();
    }
    public function user_update(Request $request)
    {
        //$input = $request->all();
      $category_id = $request->id;
    
         $this->validate($request , array
         (   
             'email' => 'required',
             'name' => 'required',
             'lname' => 'required'
         ));
         $input['name']=$request->name.','.$request->lname;
         $input['email']=$request->email;
         if($request->password !='' || $request->password !=null)
         {
            $input['password']=Hash::make($request->password);

         }
         
         $input['is_active']=$request->is_active;
       User::where('id',$category_id)->update($input);

        $request->session()->flash('alert-success','User has been sucessfully updated.');
        return Redirect::back();
    }
    
    public function categoryDestory(Request $request , $userDelete)
    {
       // return $userDelete;
      
       $m = User::where('id',$userDelete)->delete();
      // $m1 = Category::where('parent_id','=',$id)->delete();
        
      $request->session()->flash('alert-success','User has been sucessfully deleted.');
      return Redirect::route('user-list');
        
        
    }

    public function category_status_update(Request $request)
    {
        $input = $request->all();
        DB::table('category')->where('category_id',$input['category_id'])->update($input);
        $request->session()->flash('alert-success','Category has been sucessfully updated.');
        return Redirect::route('category_list');
    }
    
     
    public function category_show_update_store(Request $request)
    {
        $input = $request->all();
        DB::table('category')->where('category_id',$input['category_id'])->update($input);
        $request->session()->flash('alert-success','Category has been sucessfully updated.');
        return Redirect::route('category_list');
    }
    
    
    /* Level 2 */
    
    public function sub_category_show(Request $request , $id)
    {   
        $cate_level = Session::get('cate_level');
        $cate_level++;
        Session::put('cate_level', $cate_level);
        Session::save();
        $data['category_data'] = Category::where('parent_id',$id)->get();
        $sup_parrent=DB::table('category')->where('category_id','=',$id)->value('title');
        $page_title = $sup_parrent." sub Categories List - Astute Analytica";
        return view('masters.category.sub_category',compact('page_title','sup_parrent','id'),$data);
        
    }
    public function add_sub_category(Request $request ,$id)
    {
        $page_title = "Add Category - Astute Analytica";
       return view('masters.category.add_sub_category',compact('page_title','id'));
    }
    public function sub_category_store(Request $request)
    {
        $p_id = $request->parent_id;
        $input = $request->all();
        $this->validate($request , array
         (    
             'slug' => 'unique:category',
             'title' => 'required',
         )); 
    
        Category::insert($input);
        $request->session()->flash('alert-success','Sub Category has been sucessfully added. !!');
        return Redirect::route('sub_category',$p_id);
        
    }
    public function sub_category_update(Request $request,$id)
    {
      $data['category_data'] = Category::where('category_id',$id)->get();
      $page_title = "Edit Sub Category - Astute Analytica";
      return view('masters.category.edit_sub_category',compact('page_title','id'),$data);
   }
   public function sub_category_update_store(Request $request)
    {
        $p_id = $request->parent_id;
        $category_id = $request->category_id;
        $input = $request->all();
        
        Category::where('category_id',$category_id)->update($input);
        $request->session()->flash('alert-success','Sub Category has been sucessfully updated.');
        return Redirect::route('sub_category', $p_id); 
    }

    public function sub_category_status_update(Request $request)
    {
        $p_id = $request->parent_id;
        $input = $request->all();
        Category::where('category_id',$input['category_id'])->update($input);
        $request->session()->flash('alert-success','Sub Category has been sucessfully updated.');
        return Redirect::route('sub_category',$p_id);
    }
    
   
}
