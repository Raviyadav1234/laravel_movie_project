
@include('admin.partner.header')

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

<!------------- Delete Message Showing Code start----------->
@if (Session::has('success'))
    <div class="alert alert-success">
     {{ Session::get('success') }}  
    </div>
@endif
<!------------- Delete Message Showing Code End----------->
   
   <?php if(count($partners)>0){ ?>
<table width="100%" border="1">
	<thead>
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Description</th>
		<th>Partner_since</th>
		<th>Partner_Pic</th>
		<th>Created_At</th>
		<th>Edit</th>
		<th>Delete</th>
	<tr/>
	</thead>
	<tbody>
		<?php foreach($partners as $partner) {?>
          <tr>
          	<td><?php echo $partner->id ;?></td>
          	<td><?php echo $partner->name ;?></td>
          	<td><?php echo $partner->description ;?></td>
          	<td><?php echo $partner->partner_since ;?></td>
          	<td><?php echo "<img src='/storage/{$partner->partner_pic}' style='hieght:100px;width:150px;'/>";?></td>
          	<td><?php echo $partner->created_at ;?></td>
          	<td><a style="width:100px; height: 35px;" class="btn btn-outline-success" href="{{route('admin.partner.edit',$partner->id)}}">Edit</a></td>
          	<td><a  id="red" class="btn btn-danger" href="{{route('admin.partner.delete',$partner->id)}}">Delete</a></td>
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
{{$partners->links()}}
	
<a class="btn btn-outline-success mid" href="{{url('admin/partner/add')}}">Add Partner</a>


@include('admin.partner.footer')
</body>

</html>



