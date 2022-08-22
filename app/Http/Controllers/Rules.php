<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\steak;
use App\Models\Experience_Points;
use App\Models\User_Question;
use App\Models\Rule_Contents;
use App\Models\JobsTable;
use App\Models\User;
use App\Models\CreateLocationTable;
use App\Models\Category;

class Rules extends Controller
{
    public function index() {

    	$data['sub_heading']  = 'Rules';
    	$data['page_title']   = 'Rules';
    	if (Auth::check()) {

    	$xp_res = Experience_Points::where("user_id", Auth::user()->id)->first();
        if(count($xp_res) > 0)
        {
            $data['xp_res'] =  $xp_res;
            $data['xp_bar'] =  (( $xp_res->xp_point  / $xp_res->level_up_xp ) * 100);
        } else {
            $data['xp_res'] =  $xp_res;
            $data['xp_bar'] =  0;
        }
        /******** User XP *******/

        /****** XP points **********/
        $resxp = steak::where("user_id", Auth::user()->id)->get();
        if(count($resxp) > 0)
        {
            $data['xp_point'] =  $resxp[0]->steak_point;
        } else {
            $data['xp_point'] =  0;
        }
        /****** XP points **********/
        /********* Total and Super Points ********/
          $uq_res = user_question::where('user_id', Auth::user()->id)->where('is_correct', 1)->get();
          $points = 0;
              foreach ($uq_res as $single) {
                if($single->level_id==1){
                  $points = $points+1;
                }else if($single->level_id==2){
                  $points = $points+2;
                }else if($single->level_id==3){
                  $points = $points+3;
              }
            }
          $data['totalpoints'] = $points;
          $data['superpoints'] = floor($points/100);
        /********* Total and Super Points ********/


       }
        $data['rules']        =  Rule_Contents::first();
        return view('userquestion.rules', $data);


    }

    public function checkUsername(Request $request){
      $user           = User::where('username', $request->username)->first();
      if($user){
          echo 'false';
      }else{
         echo 'true';
      }

    }

    public function checkUserEmail(Request $request){
      $email           = User::where('email', $request->email)->first();
      if($email){
          echo 'false';
      }else{
         echo 'true';
      }

    }

    public function manage_rules(){

      $data['sub_heading']  = 'Car Post';
      $data['page_title']   = 'Car Post';
      $data['catres']        =  Category::paginate(100);
      $data['locres']        =  CreateLocationTable::paginate(100);

      return view('rules.index', $data);

    }

    public function joblisting(){

        $data['sub_heading']  = 'Job Listing';
        $data['page_title']   = 'Job\'s Page';
        $data['jobres']        =  JobsTable::paginate(100);

        return view('rules.joblist', $data);

    }

    public function carlisting(){

        $data['sub_heading']  = 'Car Listing';
        $data['page_title']   = 'Car\'s Page';
        $data['carres']        =  JobsTable::get();
        $data['catres']        =  Category::get();

        return view('cars.index', $data);

    }

    public function post_rule(Request $request){

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
           return redirect('manage-rules');
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
           return redirect('manage-rules');
          } else {
           return redirect()->back()->with('message', 'Couldn\'t create Page!');
          }
        }



    }

}
