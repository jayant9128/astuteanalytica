<?php

namespace App\Http\Controllers\masterAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;

class CategoryController extends Controller
{
    /*Level 1*/
    public function category_show(Request $request)
    {
        Session::put('cate_level', 1);
        Session::save();
        $data['category_data'] = Category::where('parent_id',0)->get();
        $page_title = "Categories List - Astute Analytica";
        return view('masters.category.category',compact('page_title'),$data);
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
    
    
    public function add_category(Request $request)
    {
       
       $page_title = "Add Category - Astute Analytica";
       return view('masters.category.add_category',compact('page_title'));
    }
    
    public function category_store(Request $request)
    {
       $input = $request->all();
   
        $input['parent_id'] = 0;
        $this->validate($request , array
         (    
             'slug' => 'unique:category',
             'title' => 'required',
         )); 
      /*if($request->file('image')!='')
      {
          $file=$request->file('image');
          $filename=$file->getClientOriginalName();
          $imgname = uniqid().$filename;
          
          $input['image']= $imgname;       
          $destinationPath=public_path('upload/category/');       
          $request->file('image')->move($destinationPath, $imgname);
         
      } */
           Category::insert($input);
            $request->session()->flash('alert-success','Category has been sucessfully added.');
            return Redirect::route('category_list');
    }
       
       
    public function category_update(Request $request,$id)
    {
      $data['category_data'] = Category::where('category_id',$id)->get();
      $page_title = "Edit Category - Astute Analytica";
      return view('masters.category.edit_category',compact('page_title'),$data);
    }
    public function category_update_store(Request $request)
    {
        $input = $request->all();
      $category_id = $request->category_id;
    
         $this->validate($request , array
         (   
             'title' => 'required'
         ));
      /*if($request->file('image')!='')
      {
         
          $data=DB::table('category')->where('category_id','=',$category_id)->value('image');
          $fullpath=public_path('upload/category/').$data;
          File::delete($fullpath);
          
          $file=$request->file('image');
          $filename=$file->getClientOriginalName();
          $imgname = uniqid().$filename;

          $input['image']= $imgname;       
          $destinationPath=public_path('upload/category/');       
          $request->file('image')->move($destinationPath, $imgname);

      } 
      */
       Category::where('category_id',$category_id)->update($input);

        $request->session()->flash('alert-success','Category has been sucessfully updated.');
        return Redirect::route('category_list');
    }
    
    public function categoryDestory(Request $request , $id)
    {
      
       $m = Category::where('category_id','=',$id)->delete();
       $m1 = Category::where('parent_id','=',$id)->delete();
        
     /* $data = Product::where('category', 'LIKE', '%"'.$id.'"%')->get();
      foreach($data as $dt)
      {
          echo $dt->category;
          $old_cat =  json_decode($dt->category);
          $pro_id = $dt->product_id;
          foreach($old_cat as $old)
          {
              if($old == $id)
              {
                  
              }
              else
              {
                  $new[] = $old;
              }
              
          }
          $input['category'] =  json_encode($new);
          DB::table('products')->where('product_id',$pro_id)->update($input);
          unset($new);
      }
        */
      $request->session()->flash('alert-success','Category has been sucessfully deleted.');
      return redirect()->back();
        
        
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
