<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Partner;

class PartnerController extends Controller
{


   public function create()
    {
      return view('admin.partner.add');
    }

    
     public function show()
    {
        //$partners = Partner::all();
        $partners = DB::table('partners')->paginate(2);
        return view('admin.partner.show',compact('partners'));
    }



    public function store(Request $request)
    {
       $my_errors = array();
       $partner_name = $request->get('partner_name');
       $partner_desc = $request->get('partner_desc');
       $partner_since = $request->get('partner_since');
       $partner_pic = $request->file('partner_pic');

  
        foreach($request->all() as $field => $value){
        if(is_null($value) or empty($value)){
          $my_errors[$field] = "{$field} is required";
           return view('admin.partner.add',compact('my_errors'));
            }  
        }

        if(count($my_errors)>0){
            //return view('admin.partner.add',compact('my_errors'));
            //return redirect()->to(route('admin.partner.add'));
            return redirect()->to(route('admin.addpartner'));
        }elseif($request->hasFile('partner_pic')){

            if($request->file('partner_pic')->isValid()){

            $path = $request->partner_pic->store('partner_pic');
            $partner = new Partner();
            $partner->name = $partner_name;
            $partner->description = $partner_desc;
            $partner->partner_since = $partner_since;
            $partner->partner_pic = $path;
            $partner->save();
            echo 'Partners Added Successfully';
            }
           
        }

        return redirect()->to(route('admin.dashboard'));
    }



     public function edit($id)
    {
        $partners = Partner::findOrFail($id);

        //return redirect()->to(url('admin/role/edit'));
        return view('admin.partner.edit',compact('partners'));
    }



    public function update(Request $request, $id)
    {

       if($request->hasFile('partner_pic')){

        if($request->file('partner_pic')->isValid()){

         $path = $request->partner_pic->store('partner_pic');
             
             Partner::where('id',$id)->update([
            'name'=>$request->partner_name,
            'description'=>$request->partner_desc,
            'partner_since'=>$request->partner_since,
            'partner_pic'=>$path
        ]);

        }

       }

        return redirect()->to(route('admin.dashboard'));
    }




 public function destroy($id)
    {

        $partner = Partner::findOrFail($id);
        $partner->delete();

     //return redirect()->to(url('admin/partner/show'));
     return redirect()->back()->with('success','Data Deleted Successfully');
    }
    
}
