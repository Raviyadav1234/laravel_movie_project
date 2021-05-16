<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Roles;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.role.add');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $my_errors = array();
        $role = $request->get('role');
        foreach($request->all() as $field => $value){
        if(is_null($value) or empty($value)){
          $my_errors[$field] = "{$field} is required";
           return view('admin.role.add',compact('my_errors'));
          //return redirect()->to(route('admin.addrole'));
            }
        }
        

        if(count($my_errors)>0){
            //return view('admin.role.add',compact('my_errors'));
            return redirect()->to(route('admin.addrole'));
        }else{
            Roles::create([
            'role'=>$role,
        ]);

           /* $roles = new Roles();
            $roles->role=$role;
            $roles->save();*/
           //return "<script>alert('data added successfully')</script>";
          //return redirect()->to(route('admin.dashboard'));
        }

        
        //$roles = Roles::all();
        //return "<script>alert('data added successfully')</script>";
        return redirect()->to(route('admin.dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
       /* $roles = Roles::all()->paginate(3);
        return view('admin.role.show',compact('roles'));*/

        $roles = DB::table('roles')->paginate(5);
        return view('admin.role.show',compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Roles::findOrFail($id);

        //return redirect()->to(url('admin/role/edit'));
        return view('admin.role.edit',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input_data = $request->validate([
        'role'=>'required'
        ]);

        Roles::whereId($id)->update($input_data);

        return redirect()->to(route('admin.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $role = Roles::findOrFail($id);
        $role->delete();

     //return redirect()->to(url('admin/role/show'));
     return redirect()->back()->with('success','Data Deleted successfully');
    }
}
