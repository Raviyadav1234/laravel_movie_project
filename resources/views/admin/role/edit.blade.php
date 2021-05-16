
@include('admin.role.header')

<form action="{{route('admin.role.update',$roles->id)}}" method="post">
	@csrf
	<p>
		Enter Your Role : <input type="text" name="role" value="{{$roles->role}}">
		  <span style="color: red">
	    <?php isset($my_errors['role'])?print($my_errors['role']):"";?>
          </span>
	</p>

	<p>
	  <input type="submit" name="btn" value="Update">
	</p>
</form>
</body>
</html>