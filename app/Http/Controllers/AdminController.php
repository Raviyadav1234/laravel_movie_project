<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
use App\Roles;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::all();
        return view('admin.role.show',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

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
            }  
        }
        

        if(count($my_errors)>0){
            return view('admin.role.add',compact('my_errors'));
            return redirect()->to(route('admin.role.add'));
        }else{
            $add=Roles::create([
            'role'=>$role,
        ]);

        }

        
        //$roles = Roles::all();
        return view('admin.role.dashboard',compact('role'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
