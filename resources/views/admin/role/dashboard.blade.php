
@include('admin.role.header')
<br><br>
<a class="btn btn-outline-success mid" href="{{url('admin/role/add')}}">Add Your Role</a><br><br>
<a class="btn btn-outline-success mid" href="{{url('admin/role/show')}}">Show Role</a><br><br>

<a class="btn btn-outline-success mid" href="{{url('admin/partner/add')}}">Add Partner</a><br><br>

<a class="btn btn-outline-success mid" href="{{url('admin/partner/show')}}">Show Your Partner</a><br><br>

@include('admin.role.footer')
</body>
</html>