<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;


use App\Models\Question;
use App\Models\Category;
use App\Models\JobsTable;
use App\Models\Level;
use Auth;
use Mail;

//Enables us to output flash messaging
use Session;

class JobsController extends Controller
{
    public function __construct() {
//      $this->middleware('auth');
    }

    public function index(Request $request){

        $data['sub_heading']  = 'Cars';
        $data['page_title']   = 'Car Categorie\'s';
        $categories           = Category::orderBy('category','ASC')->get();

        /*------------ create cat arr -------------*/
        $catarr = array();
        $catdata = array();
        foreach($categories as $category){
            $countres  = JobsTable::where("category_id", $category->id)->get();
            $catarr[count($countres)] = $category->category;
            $catdata[$category->id] = $catarr;
            unset($catarr);
        }
        /*------------ create cat arr -------------*/
        $data['catdata']   = $catdata;
        return view('jobs', $data);
    }

    public function catjobs(Request $request, $id){

        $data['sub_heading']  = 'Cars';
        $data['page_title']   = 'All job\'s in';
        $data['jobslist']     = JobsTable::where("category_id", $id)->orderBy('id','ASC')->get();
        $cat_name             = Category::find($id);
        $data['jobcat']   = $cat_name->category;

        return view('jobs', $data);
    }

    public function jobdetail(Request $request, $id){

        $data['sub_heading']  = 'Car Detail';
        $data['page_title']   = 'Car detail page';
        $data['jobres']       = JobsTable::find($id);

        return view('jobs_detail', $data);
    }

    public function search(Request $request){

        $data['sub_heading']  = 'Car Detail';
        $data['page_title']   = 'Car detail page';
        $data['what']       = $request->what;
        $data['where']       = $request->where;
        $data['_token']       = $request->_token;

        $jobres       = JobsTable::where("where", $request->where)->Where("job_title", "LIKE", "%{$request->what}%")->get();
        $resdata = "";
        $resdata .= '<h4>Search Result List</h4><hr width="100%" />';
        if(count($jobres) > 0) {
            foreach($jobres as $v) {
                $resdata .= "<p><a href='" . URL::to( "/jobdetail/" . $v->id ) . "'>" . $v->job_title ."</a><p />";
            }
        } else {
            $resdata .= "<p> No result Found !!!<p />";
        }


        return $resdata;
    }

     public function store(Request $request){
        $questions = new Question;
         $this->validate($request, [
            'question'=>'required',
            'answer'=>'required',
            'level'=>'required',
            'category'=>'required',

        ]);
        $questions->question    = $request->question;
        $questions->answer      = $request->answer;
        $questions->level_id    = $request->level;
        $questions->category_id = $request->category;
        $saved                  = $questions->save();
        if ($saved) {
         return redirect()->back()->with('message', 'Question successfully added!');
        } else {
         return redirect()->back()->with('message', 'Couldn\'t create Category!');
        }

    }

    public function Services(Request $data){

        /********* Email ***********/
        $first_name     = $data['first_name'];
        $last_name      = $data['last_name'];
        $email          = $data['email'];
        $username       = $data['username'];
        $password       = $data['password'];


        Mail::send("emails.RegisterEmail", ['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'username' => $username, 'password' => $password], function($message)  use ($email){
            $message->to($email);
            $message->subject("You'r account has been created successfully!!!");
        });
        /********* Email ***********/

        return response(array(
            'success' => true,
            'data' => "",
            'message' => "Email send successfully"
        ),200,[]);
    }

    public function contact_us(Request $request){
        $data['sub_heading']  = 'Contact us';
        $data['page_title']   = 'Contact page';

        return view('contactus', $data);
    }

    public function email_form(Request $request){

        $data['sub_heading']  = 'Contact us';
        $data['page_title']   = 'Contact page';
        $data['message']   = "Email has been send Successfully !!";

        $to_email = 'hr@batraining.org.uk';
        $subject = 'Email from Cars Management !!!';
        $message = 'Please have a look on the following information.<br /><br />';
        $message .= 'Name:' . $request->name . '<br />';
        $message .= 'Email:' . $request->email . '<br />';
        $message .= 'Phone No:' . $request->pno . '<br />';
        $message .= 'Message:' . $request->msg . '<br /><br />';
        $message .= 'Thanks & Regards' . '<br />';
        $message .= 'Cars Management.com';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: habibahmad001@gmail.com';
        @mail($to_email,$subject,$message,$headers);

        return view('contactus', $data);
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
