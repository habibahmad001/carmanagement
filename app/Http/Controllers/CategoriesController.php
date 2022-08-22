<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use App\Models\Category;
use Auth;

//Enables us to output flash messaging
use Session;

class CategoriesController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data['sub_heading'] = 'Categories';
        $data['page_title']  = 'Super Quiz Categories';
        $data['categories']  = Category::paginate(20);
        return view('categories.index', $data);
    }

     public function store(Request $request){
        $cat            = new Category;
         $this->validate($request, [
            'category'=>'required|unique:categories'
        ]);
        $cat->category  = $request->category;
        $saved          = $cat->save();
        if ($saved) {
         $request->session()->flash('message', 'Category successfully added!');
         return redirect('categories');
        } else {
         return redirect()->back()->with('message', 'Couldn\'t create Category!');
        }

    }

    public function isCategoryExist(Request $request) {
      $category           = $request->category;
      $id                 = $request->id;
      $exist              = false;
      if($id > 0){
        $cat_name         = Category::where('category', $category)->where('id', '!=', $id)->first();
        if($cat_name){
          $exist          = true;
        }

      } else {
          $cat_name       = Category::where('category', $category)->first();
          if($cat_name){
            $exist        = true;
          }
      }

      return Response::json(['exist'=> $exist]);
    }

    public function create(){
        //
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }


    public function getCategory($id){

        $data             = [];
        $cat              = Category::find($id);
        $data['category'] = $cat;
        return Response::json($data);

    }
    public function update(Request $request){

        $this->validate($request, [
            'category'=>'required|unique:categories,category,'.$request->cat_id
        ]);

      $Category           = Category::find($request->cat_id);
      $Category->category = $request->category;
      $Category->save();
      $request->session()->flash('message', 'Category successfully Edited!');
      return redirect('categories');
    }


    public function destroy($id)
    {
        $ids              = explode(',', $id);
        $ids_to_delete    = array_map(function($item){ return $item; }, $ids);
        category::whereIn('id', $ids_to_delete)->delete();
        return redirect('categories')->with('message', 'Selected users has been deleted successfully!');
    }


}
