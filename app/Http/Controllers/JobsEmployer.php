<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;


use App\Models\Question;
use App\Models\Category;
use GuzzleHttp\Client;
use App\Models\JobsTable;
use App\Models\CreateLocationTable;
use Auth;
use Validator;

//Enables us to output flash messaging
use Session;

class JobsEmployer extends Controller
{
//    public function __construct() {
//      $this->middleware('employer');
//    }

    public function index(Request $request){

        $data['sub_heading']  = 'Job Detail';
        $data['page_title']   = 'Job detail page';

        return view('privateuser.employer_home', $data);
    }

    public function employer_listing(Request $request){

        $data['sub_heading']  = 'Job Detail';
        $data['page_title']   = 'Job detail page';
        $data['Jobs']         = JobsTable::where("user_id", Auth::user()->id)->orderBy('id','ASC')->get();

        return view('privateuser.employer_listing', $data);
    }

    public function create_job(Request $request){

        $data['sub_heading']  = 'Car Post';
        $data['page_title']   = 'Car Post';
        $data['catres']        =  Category::paginate(100);
        $data['locres']        =  CreateLocationTable::paginate(100);

        return view('privateuser.employer_create_job', $data);
    }

    public function emp_c_j(Request $request){

        $this->validate($request, [

            'page_title'=>'required',
            'content'=>'required',
            'cat_id'=>'required',
            'where'=>'required'

        ]);

        if(!empty($request->page_id)){

            $rules              = JobsTable::find($request->page_id);
            $rules->job_title  = $request->page_title;
            $rules->job_desc     = $request->content;
            $rules->category_id  = $request->cat_id;
            $rules->where         = $request->where;
            $rules->user_id       = Auth::user()->id;
            $saved              = $rules->save();
            if ($saved) {
                $request->session()->flash('message', 'Page has been successful edited!');
                return redirect('employer_listing');
            } else {
                return redirect()->back()->with('error', 'Error while edit the page');
            }
        }else{

            $rules              = new JobsTable;
            $rules->job_title  = $request->page_title;
            $rules->job_desc     = $request->content;
            $rules->category_id  = $request->cat_id;
            $rules->where         = $request->where;
            $rules->user_id       = Auth::user()->id;
            $saved              = $rules->save();
            if ($saved) {
                $request->session()->flash('message', 'Page successfully added!');
                return redirect('employer_listing');
            } else {
                return redirect()->back()->with('message', 'Couldn\'t create Page!');
            }
        }



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

    public function apiWithoutKey()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = "https://api.github.com/users/kingsconsult/repos";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('APIresponse.apiwithoutkey', compact('responseBody'));
    }

    public function apiWithKey()
    {
        $client = new Client();
        $url = "https://dev.to/api/articles/me/published";

        $params = [
            //If you have any Params Pass here
        ];

        $headers = [
            'api-key' => 'k3Hy5qr73QhXrmHLXhpEh6CQ'
        ];

        $response = $client->request('GET', $url, [
            // 'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('APIresponse.apiwithkey', compact('responseBody'));
    }

}
