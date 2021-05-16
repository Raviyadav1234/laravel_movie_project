	
@include('admin.role.header')

@section('content')

@endsection
	<style type="text/css">
		a{
			text-decoration: none;
		}

		td{
			text-align: center;
		}

		.mid{
			position: relative;
			left: 30%;
			width: 35%;
		}

		 #red{
			background: white;
			color: red;
		}

		#red:hover{
			background: red;
			color: white;
		}

		
	</style>
<h1>All Role data</h1>
<hr>


<!------------- Delete Message Showing Code start----------->
@if (Session::has('success'))
    <div class="alert alert-success">
     {{ Session::get('success') }}  
    </div>
@endif
<!------------- Delete Message Showing Code End----------->


<?php if(count($roles)>0){ ?>
<table width="100%" border="1">
	<thead>
	<tr>
		<th>#</th>
		<th>Role</th>
		<th>Created At</th>
		<th>Edit</th>
		<th>Delete</th>
	<tr/>
	</thead>
	<tbody>
		<?php foreach($roles as $role) {?>
          <tr>
          	<td><?php echo $role->id ;?></td>
          	<td><?php echo $role->role ;?></td>
          	<td><?php echo $role->created_at ;?></td>
          	<td><a style="width:100px; height: 35px;" class="btn btn-outline-success" href="{{route('admin.role.edit',$role->id)}}">Edit</a></td>
          	<td><a  id="red"  class="btn btn-danger" href="{{route('admin.role.delete',$role->id)}}">Delete</a></td>
          </tr>
		<?php }?>
	</tbody>
</table>
<?php }else{
	echo "<table width='100%' border='1' style='background-color:yellow'>";
	echo "<tr><td>No Record Found</td></tr>";
	echo "</table>";
} ?>

<br>
{{$roles->links()}}
	

<a class="btn btn-outline-success mid" href="{{url('admin/role/add')}}">Add Your Role</a>

@include('admin.role.footer')
</body>

</html>



