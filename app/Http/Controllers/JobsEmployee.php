<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;


use App\Models\Question;
use App\Models\Category;
use App\Models\JobsTable;
use App\Models\CreateLocationTable;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

//Enables us to output flash messaging
use Session;

class JobsEmployee extends Controller
{
    public function __construct() {
      $this->middleware('employee');
    }

    public function index(Request $request){

        $data['sub_heading']  = 'Job Detail';
        $data['page_title']   = 'Job detail page';

        return view('privateuser.employee_home', $data);
    }

    public function employee_listing(Request $request){

        $data['sub_heading']  = 'Car Detail';
        $data['page_title']   = 'Car detail page';
        $data['Jobs']           = JobsTable::orderBy('id','ASC')->get();
        $data['categories']   = Category::orderBy('id','ASC')->get();

        return view('privateuser.employee_listing', $data);
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



}
