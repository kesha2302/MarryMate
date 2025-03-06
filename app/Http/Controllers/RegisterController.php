<?php

namespace App\Http\Controllers;

use App\Models\EventManager;
use App\Models\UserTable;
use App\Models\Vendors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function signup(){
        return view('ClientView.signup');
    }

    public function store(Request $request){

        $request->validate(
            [
              'name' =>'required',
              'email' => 'required|email',
              'password'=> 'required',
              'contact' => 'required',
              'address'=> 'required',
            ]);


        $customer = new UserTable();
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = Hash::make($request->input('password'));
        $customer->contact = $request['contact'];
        $customer->address = $request['address'];
        $customer->role_as = "C";
        $customer->save();

        return redirect('/');

    }

    public function businessregister(){
        return view ('ClientView.businessregisterform');
    }

    public function store2(Request $request){

        $request->validate(
            [
              'role_as' => 'required',
              'name' =>'required',
              'email' => 'required|email',
            //   'password'=> 'required',
              'contact' => 'required',
              'business_type' => 'required',
              'business_name' => 'required',
              'description' => 'required',
              'AadharCard' => 'required|file|max:1000',
              'PanCard' => 'required|file|max:1000',
              'othdoc'=> 'required|file|max:1000'
            ]);

        //     echo "<pre>";
        // print_r($request->all());

        $customer = new UserTable();
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        // $customer->password = Hash::make($request->input('password'));
        $customer->contact = $request['contact'];
        $customer->role_as = $request['role_as'];

        if($request->input('role_as') === 'V'){
            $customer->role_as = "V";
            $customer->save();

            $vendor = new Vendors();
            $vendor->user_id = $customer->user_id;
            $vendor->business_type = $request['business_type'];
            $vendor->business_name = $request['business_name'];
            $vendor->description = $request['description'];
            if ($request->hasFile('AadharCard')) {
                $file=$request->file('AadharCard');
                $fileName = time() . "AC." . $request->file('AadharCard')->getClientOriginalExtension();
                $file->move('VendorsDocument', $fileName);
                $vendor->AadharCard = $fileName;
            }
            if ($request->hasFile('PanCard')) {
                $file=$request->file('PanCard');
                $fileName = time() . "PC." . $request->file('PanCard')->getClientOriginalExtension();
                $file->move('VendorsDocument', $fileName);
                $vendor->PanCard = $fileName;
            }
            if ($request->hasFile('othdoc')) {
                $file=$request->file('othdoc');
                $fileName = time() . "OTH." . $request->file('othdoc')->getClientOriginalExtension();
                $file->move('VendorsDocument', $fileName);
                $vendor->other_document = $fileName;
            }
            $vendor->status = 0;
            $vendor->save();
        }else{
            $customer->role_as ="EM";
            $customer->save();

            $em = new EventManager();
            $em->user_id = $customer->user_id;
            $em->business_type = $request['business_type'];
            $em->business_name = $request['business_name'];
            $em->description = $request['description'];
            if ($request->hasFile('AadharCard')) {
                $file=$request->file('AadharCard');
                $fileName = time() . "AC." . $request->file('AadharCard')->getClientOriginalExtension();
                $file->move('EventManagersDocument', $fileName);
                $em->AadharCard = $fileName;
            }
            if ($request->hasFile('PanCard')) {
                $file=$request->file('PanCard');
                $fileName = time() . "PC." . $request->file('PanCard')->getClientOriginalExtension();
                $file->move('EventManagersDocument', $fileName);
                $em->PanCard = $fileName;
            }
            if ($request->hasFile('othdoc')) {
                $file=$request->file('othdoc');
                $fileName = time() . "OTH." . $request->file('othdoc')->getClientOriginalExtension();
                $file->move('EventManagersDocument', $fileName);
                $em->other_document = $fileName;
            }
            $em->status = 0;
            $em->save();
        }

        $customer->save();


        return redirect('/');

    }


}
