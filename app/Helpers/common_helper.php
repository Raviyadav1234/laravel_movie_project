<?php

if(!function_exists('check_session')){
	function check_session($keyname){
		$session= session($keyname,'expired');
		if($session=='expired'){
			return redirect()->to(route('admin.login'));
		}
	}
}