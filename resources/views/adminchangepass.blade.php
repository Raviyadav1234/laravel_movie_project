<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-50 p-b-90">
                <span style="color: red">
    <?php isset($myerrors['login_error'])?print($myerrors['login_error']):"";?>
                   </span>
                <form class="login100-form validate-form flex-sb flex-w" action="{{route('admin.change.pass')}}" method="POST">
                    @csrf
                    <span style="text-transform: capitalize;" class="login100-form-title p-b-51">
                        Change Password
                    </span>

                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
                        <input class="input100" type="text" name="old_pass" placeholder="Old Password">
                        
                        <span class="focus-input100"></span>
                    </div> 
                    <span style="color: red">
                     <?php isset($myerrors['login_id'])?print($myerrors['login_id']):"";?>
                       </span>
                    
                    
                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input class="input100" type="password" name="new_pass" placeholder="New Password">
                      
                        <span class="focus-input100"></span>
                    </div>

                      <span style="color: red">
              <?php isset($myerrors['password'])?print($myerrors['password']):"";?>
                         </span>


                         <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
                        <input class="input100" type="password" name="cnf_pass" placeholder="Confirm Password">
                      
                        <span class="focus-input100"></span>
                    </div>

                      <span style="color: red">
              <?php isset($myerrors['password'])?print($myerrors['password']):"";?>
                         </span>
                    
                    <div class="flex-sb-m w-full p-t-3 p-b-24">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
                            Change
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>
</html>