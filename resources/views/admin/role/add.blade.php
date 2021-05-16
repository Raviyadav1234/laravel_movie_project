
@include('admin.role.header')

<div id="outer">
	
	<form action="{{route('admin.saverole')}}" method="POST">
	@csrf
<span style="font-size: 30px; position: relative;left: 30%; ">Add Your Role</span><br><br>
	<p>
		<span style="font-size: 20px;">Enter Your Role :</span>&nbsp;&nbsp;&nbsp; <input id="txt1" type="text" name="role" placeholder="Role">
		  <span style="color: red">
	    @php isset($my_errors['role'])?print($my_errors['role']):"";
	    @endphp
          </span>
	</p>

	<p>
	  <button class="btn btn-outline-success mid" id="txt2" type="submit">Add</button>
	</p>
</form>

</div>


@include('admin.role.footer')
</body>
</html>