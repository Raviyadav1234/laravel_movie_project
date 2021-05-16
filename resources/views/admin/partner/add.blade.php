
@include('admin.partner.header')

<form action="{{route('admin.savepartner')}}" method="post" enctype="multipart/form-data">
	@csrf
	<p>
		Partner Name :<input type="text" name="partner_name">
		 <span style="color: red">
	    <?php isset($my_errors['partner_name'])?print($my_errors['partner_name']):"";?>
          </span>
		 
	</p>

	<p>
	Partner Description : <textarea type="text" name="partner_desc"></textarea>
	<span style="color: red">
	   <?php isset($my_errors['partner_desc'])?print($my_errors['partner_desc']):"";?>
       </span> 	 
	</p>

    <p>
		Partner Since : <input type="date" name="partner_since">
		<span style="color: red">
	    <?php isset($my_errors['partner_since'])?print($my_errors['partner_since']):"";?>
         </span>
		 
	</p>

	<p>
		Select Picture : <input type="file" name="partner_pic">
		<span style="color: red">
	  <?php isset($my_errors['partner_pic'])?print($my_errors['partner_pic']):"";?>
        </span>
		 
	</p>


	<p>
	  <input type="submit" name="btn" value="Add">
	</p>
</form>

@include('admin.partner.footer')
</body>
</html>