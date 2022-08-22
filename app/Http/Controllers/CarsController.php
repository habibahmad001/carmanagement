<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use App\Models\JobsTable;
use Auth;

//Enables us to output flash messaging
use Session;

class CarsController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data['sub_heading'] = 'Cars';
        $data['page_title']  = 'Cars Categories';
        $data['cars']  = JobsTable::get();
        return view('cars.index', $data);
    }

     public function store(Request $request){
        $cars            = new JobsTable;
         $this->validate($request, [
            'cats'=>'required',
            'job_title'=>'required|string|max:255|unique:carstable,job_title',
            'color'=>'required|string|max:255',
            'model'=>'required|max:255',
            'make'=>'required|string|max:255',
            'registration'=>'required|max:255',
        ]);

        $cars->category_id  = $request->cats;
        $cars->job_title  = $request->job_title;
        $cars->where  = $request->cats;
        $cars->color  = $request->color;
        $cars->model  = $request->model;
        $cars->make  = $request->make;
         $cars->user_id  = Auth::user()->id;
        $cars->registration  = $request->registration;

        $saved          = $cars->save();

        if ($saved) {
         $request->session()->flash('message', 'Car successfully added!');
         return redirect('admincars');
        } else {
         return redirect()->back()->with('message', 'Couldn\'t create Car!');
        }

    }

    public function isCarExist(Request $request) {
      $category           = $request->category;
      $id                 = $request->id;
      $exist              = false;
      if($id > 0){
        $cat_name         = JobsTable::where('category', $category)->where('id', '!=', $id)->first();
        if($cat_name){
          $exist          = true;
        }

      } else {
          $cat_name       = JobsTable::where('category', $category)->first();
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


    public function getcar($id){

        $data             = [];
        $cat              = JobsTable::find($id);
        $data['cars'] = $cat;
        return Response::json($data);

    }
    public function update(Request $request){

        $cars           = JobsTable::find($request->cars_id);

        $this->validate($request, [
            'cats'=>'required',
            'job_title'=>'required',
            'color'=>'required|string|max:255',
            'model'=>'required|max:255',
            'make'=>'required|string|max:255',
            'registration'=>'required|max:255',
        ]);

        $cars->category_id  = $request->cats;
        $cars->job_title  = $request->job_title;
        $cars->where  = $request->cats;
        $cars->color  = $request->color;
        $cars->model  = $request->model;
        $cars->make  = $request->make;
        $cars->user_id  = Auth::user()->id;
        $cars->registration  = $request->registration;

        $cars->save();

      $request->session()->flash('message', 'Car successfully Edited!');
      return redirect('admincars');

    }


    public function destroy($id)
    {
        JobsTable::where('id', $id)->delete();
        return redirect('admincars')->with('message', 'Selected Car has been deleted successfully!');
    }


}
