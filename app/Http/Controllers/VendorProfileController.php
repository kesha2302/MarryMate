<?php

namespace App\Http\Controllers;

use App\Models\UserTable;
use Illuminate\Http\Request;

class VendorProfileController extends Controller
{
    public function profile(){
        $user = auth()->user();
        return view('SecondAdminPanel.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
              'name' =>'required',
              'email' => 'required|email',
              'contact' => 'required',
            //   'business_name'=> 'nullable|string',
            //   'description' => 'nullable|string',
            ]);

            echo"<pre>";
            // print_r($request->all());
        $user = auth()->user();

        if ($user instanceof UserTable) {

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->contact = $request->input('contact');
            $user->save();


            if ($user->vendors()->exists()) {
                $vendor = $user->vendors->first();
                if ($request->has('business_name')) {
                    $vendor->business_name = $request->input('business_name');
                }
                if ($request->has('description')) {
                    $vendor->description = $request->input('description');
                }
                $vendor->save();
            }
            elseif ($user->eventManagers()->exists()) {
                $eventManager = $user->eventManagers->first();
                if ($request->has('business_name')) {
                    $eventManager->business_name = $request->input('business_name');
                }
                if ($request->has('description')) {
                    $eventManager->description = $request->input('description');
                }
                $eventManager->save();
            }

            return redirect('/ManageProfile')->with('successmessage', 'Profile updated successfully');
        } else {

            return redirect('/ManageProfile')->with('error', 'Failed to update profile. User not found or invalid.');
        }
    }
}
