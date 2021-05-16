<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Changepassword;

class ChangepassController extends Controller
{

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


    public function changepass(Request $request){

    	$login_id = $request->get('login_id');

    	$task = Changepassword::where('login_id',$login_id)->get();

    	$dbpass = $task[0]->password;
    	$id = $task[0]->id;
    	$old_pass = $request->get('old_pass');
    	$new_pass = $request->get('new_pass');
    	$cnf_pass = $request->get('cnf_pass');

      if($dbpass == $old_pass):
      	if($new_pass == $cnf_pass):
      		if($cnf_pass == $old_pass):
      			return redirect()->to(url("password/{$id}?msg=3"));
      		else:
      			$task = Task::find($id);
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
