<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use App\Roles;

class LoginController extends Controller
{



    //
    public function login(Request $request){
    	$myerrors = array();

    	foreach ($request->all() as $field => $value) {
    		if(is_null($value) or empty($value)){
    			$myerrors[$field] = "{$field} is required";
            return view('login',compact('myerrors'));

    	}

    }


    	if(count($myerrors)>0){
    		return view('login',compact('myerrors'));

    	}elseif(null!==($request->session()->has('login_id'))){
           
            $login_id = $request->get('login_id');
            $password = $request->get('password');
        
        $request->session()->put('data',array(

          'login_id'=>$login_id,
          'password'=>$password
       ));

            $login_count = Login::where('login_id',$login_id)
                            ->where('password',$password)->count();

            if($login_count>0){
                return redirect()->to(route('admin.dashboard'));
            }else{
                $myerrors['login_error'] = 'Invalid Login Id or Password';

                return view('login',compact('myerrors'));
            } 

        }else{
    		return redirect()->to(route('admin.dashboard'));

    	}

    }


    public function logout(Request $request){
        $request->session()->flush();
        //return view('login');
        return redirect()->to(url('admin'));
        
        
    }


    public function admindashboard(Request $request){
        check_session('data');

        if($request->session()->has('data')){
            return view('admin.role.dashboard');

        }else{
            //return view('login');
            return redirect('/admin');
        }
        
    }




 //function for view change-password page
    public function create(){

        return view('adminchangepass');
    }


    public function index(Request $request,$id){
     
     $errors = array();

     $msg = $request->get('msg');
     echo $msg;
     switch($msg){
        case 1:
        $errors['old'] = "Old Password Dose not Match";
        break;

        case 2:
        $errors['new'] = "New Password and Confirm Password not Matched";
        break;

        case 3:
        $errors['same'] = "New Password Cannot be same as Old Password";
        break;
     }
      $task = Task::find($id);
      $email = $task->email;
      $id = $task->id;

      return view('change-pass',compact('email','errors'));

    }


//function for change password
    public function changepass(Request $request){

        $login_id = $request->get('login_id');
        $password = $request->get('password');

        $db_login_id = Login::where('login_id',$login_id)->get();

        $dbpass = Login::where('password',$password)->get();

        $db_id = Login::find($id);

        //$dbpass = $task[0]->password;
        //$id = $task[0]->id;
        $old_pass = $request->get('old_pass');
        $new_pass = $request->get('new_pass');
        $cnf_pass = $request->get('cnf_pass');

      if($dbpass == $old_pass):
        if($new_pass == $cnf_pass):
            if($cnf_pass == $old_pass):
                return redirect()->to(url("password/{$id}?msg=3"));
            else:
                $task = Login::find($id);
                $task->password = $cnf_pass;
                $task->save();
                echo "Password Updated Successfully";
            endif;
        else:
            return redirect()->to(url("password/{$id}?msg=2"));
        endif;
      else:
        return redirect()->to(url("password/{$id}?msg=1"));
      endif;
    }


}


