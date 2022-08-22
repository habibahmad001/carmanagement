<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use App\Models\User_Question;
use DB;
use Validator;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
use Auth;
//use Image;
use App\Models\steak;

use App\Models\Experience_Points;

//Enables us to output flash messaging
use Session;

class UserController extends Controller {

    public function __construct() {
    $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources

    }

    public function index() {



        $data['sub_heading']  = 'Users';
        $data['page_title']   = 'Super Quiz Users';
        $data['users']        =  User::where('user_type','user')->orwhere('user_type', 'employee')->orwhere('user_type', 'employer')->paginate(10);
        return view('users/index', $data);
    }

    public function user_create() {
        return view('users.create');
    }

    public function getusers($id){
        $data         = [];
        $user         = User::find($id);
        $data['user'] = $user;
        return Response::json($data);
    }

    public function user_profile(){

      $data['sub_heading']  = 'profile';
      $id = Auth::user()->id;
      $data['current_user'] = User::find($id);
      $uq_res = user_question::where('user_id', $id)->where('is_correct', 1)->get();
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
      $data['points'] = $points;
      $data['super_points'] = floor($points/100);

      $res_dt =  DB::select( DB::raw("SELECT *,datediff(CURDATE(), start_date) as dta FROM sessions WHERE status='active'") );
      if(count($res_dt) > 0){

        $data['month_res'] = DB::table('users')
            ->join('regular_points', 'regular_points.user_id', '=' , 'users.id')
            ->join('super_points', 'super_points.user_id', '=' , 'users.id')
            ->join('user_experience_points', 'user_experience_points.user_id', '=' , 'users.id')
            ->select('users.id', 'users.username','regular_points.regular_point','regular_points.session_id','super_points.superpoint','super_points.session_id','user_experience_points.user_level')
            ->where('regular_points.session_id', '=',$res_dt[0]->id)
            ->groupBy('users.id')
            ->orderBy('regular_points.regular_point','DESC')
            ->orderBy('super_points.superpoint','DESC')
            ->get();


      }else{
        $data['month_res'] = array();
        $data['res_msg'] = "All session are inactive at this time !!!";
        $data["one_monthago"] = date('M/d',strtotime('-1 month', time() ));
        $data["current_month"] = date('M/d',time());
      }

        /******** User XP *******/
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

      return view('users.profile',$data);

    }

    public function reset_password(Request $request)
    {
      $password = Auth::user()->password;
      $validator = Validator::make($request->all(), [
        'old_password'     => 'required',
        'new_password'     => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
      ]);



      if ($validator->passes()) {

          //echo bcrypt($request->old_password).'__'.$password; exit;
         if(!Hash::check($request->old_password, $password)){
          $data['error']  = 'The specified password does not match the database password';
           return response()->json(['error'=>'The specified password does not match the database password']);
        }else{

            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return response()->json(['error'=>'null']);
      }
     }else{

       return response()->json(['error'=>$validator->errors()->all()]);
      }



    }

    public function store_test(Request $request) {
      $organization             = new Organization;
      $organization->name       = $request->name;
      $organization->email      = $request->email;
      $organization->phone      = $request->phone;
      $organization->country_id = $request->country;
      $organization->state_id   = $request->state;
      $organization->city_id    = $request->city;
      $saved                    = $organization->save();
      if ($saved) {
       return redirect()->back()->with('message', 'Organization has been created successfully!');
      } else {
       return redirect()->back()->with('error', 'Couldn\'t create organization!');
      }
     }

    public function create_user(Request $request){
      $users              = new User;

      $users->first_name  = $request->first_name;
      $users->last_name   = $request->last_name;
      $users->phone       = $request->phone;
      $users->status      = $request->status;
      $users->type        = 'user';
      $users->username    = $this->getUsername($request->first_name,$request->last_name);
      $users->email       = $request->email;
      $users->password    = bcrypt($request->password);
      $saved              = $users->save();
     if ($saved) {
       $request->session()->flash('alert-success', 'User was successful added!');
       return redirect('users');
      } else {
       return redirect()->back()->with('error', 'Couldn\'t create organization!');
      }

    }

    public function edit_user($id){
        $user           = User::find($id); //Get user with specified id
        $data['user']   =   $user;
        return view('users.edit',$data); //pass user and roles data to view
    }

    public function update_user(Request $request){
       $id              =        $request->user_id;
       $this->validate($request, [
            'first_name'=>'required|max:120',
            'last_name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id
        ]);
      $users              = User::find($id);
      $users->first_name  = $request->first_name;
      $users->last_name   = $request->last_name;
      $users->phone       = $request->phone;
      $users->email       = $request->email;
      $users->status      = $request->status;
      $saved              = $users->save();
      if ($saved) {
       $request->session()->flash('message', 'User was successful edited!');
       return redirect('users');
      } else {
       return redirect()->back()->with('error', 'Couldn\'t create organization!');
      }
    }

    public function isEmailExist(Request $request) {
      $email            = $request->email;
      $id               = $request->id;
      $exist            = false;
      if($id > 0){
        $user           = User::where('email', $email)->where('id', '!=', $id)->first();
        if($user){
          $exist        = true;
        }
      } else {
          $user         = User::where('email', $email)->first();
          if($user){
            $exist      = true;
          }
      }
      return Response::json(['exist'=> $exist]);
    }

    public function getUsername($firstName, $lastName) {
        $username     = Str::slug($firstName . "-" . $lastName);
        $userRows     = User::whereRaw("username REGEXP '^{$username}(-[0-9]*)?$'")->get();
        $countUser    = count($userRows) + 1;
        return ($countUser > 1) ? "{$username}-{$countUser}" : $username;
    }

    public function delete_user($id,Request $request) {
          //Find a user with a given id and delete
          $user       = User::findOrFail($id);
          $user->delete();
          $request->session()->flash('alert-success', 'User was successful deleted!');
          return redirect('users');
    }


    public function store(Request $request) {

    //Validate name, email and password fields
        $this->validate($request, [
            'first_name'=>'required|max:120',
            'last_name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        $user       = User::create($request->only('email', 'first_name', 'last_name', 'password')); //Retrieving only the email and password data
        $roles      = $request['roles']; //Retrieving the roles field
    //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();
            $user->assignRole($role_r); //Assigning role to user
            }
        }
    //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->with('message',
             'User successfully added.');
    }






    public function show($id) {
        return redirect('users');
    }


    public function edit($id) {
        $user           = User::find($id); //Get user with specified id
        $data['user']   =   $user;
        return view('users.edit',$data); //pass user and roles data to view
    }

    public function update(Request $request, $id = null) {

        if(!$id) $id = Auth::user()->id;
        $user = User::findOrFail($id); //Get role specified by id
        //Validate name, email and password fields
        $this->validate($request, [
            'first_name'=>'required|max:120',
            'last_name'=>'required|max:120',
            'username'=>'unique:users,username,'.$id,
            'email'=>'required|email|unique:users,email,'.$id
        ]);


        $input = $request->only(['first_name', 'last_name', 'email']);
        if($request->password) {
          $input['password'] = bcrypt($request->password);
        }
        if($request->hasFile('avatar')){


        if($user->avatar!='default.jpg'){
        unlink(public_path() . '/uploads/avatars/'.$user->avatar);
        }


        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        //Image::make($avatar)->resize(90, 90)->save( public_path('/uploads/avatars/' . $filename ) );
        $request->file('avatar')->move('uploads/avatars', $filename);
        $input['avatar'] = $filename;

        }


        if($user->fill($input)->save()){
        $request->session()->flash('message', 'User was successful Edited!');
        return redirect('/my-account');
        }else{
        return redirect()->back()->with('error', 'Couldn\'t create organization!');

        }

    }


    public function destroy($id) {
    //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users')->with('message', 'Selected category has been deleted successfully!');
    }

    public function my_account() {
      $id                     = Auth::user()->id;
      $user                   = User::findOrFail($id); //Get user with specified id
      $data                   = [];

      $data['is_reload_btn']  = 0;
      $data['is_plus_icon']   = 0;
      $data['sub_heading']    = 'My Account';
      $data['page_title']     = 'My Account - National Installations Portal';
      $data['user']           = $user;
      return view('accounts.index', $data);
    }
}
