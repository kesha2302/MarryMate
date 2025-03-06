<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('ClientView.signin');
    }

    public function logindata(Request $request){
        $request->validate(
            [
              'email' => 'required|email',
              'password'=> 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user->role_as == 'C') {
                    return redirect('/')->with([
                        'success' => 'Login successful!',
                        'username' => $user->name
                    ]);
                } elseif ($user->role_as == 'A') {
                    return redirect('/MainAdmin')->with([
                        'success' => 'Admin Login successful!',
                        'username' => $user->name
                    ]);
                }elseif ($user->role_as == 'V' || $user->role_as == 'EM') {
                    return redirect('/OtherAdmin')->with([
                        'success' => 'Login successful!',
                        'username' => $user->name
                    ]);
                }

            }

            return redirect()->back()->with('error', 'Invalid email or password.');

    }

    public function logout(Request $request)
    {

        $request->session()->forget('customer_id');
        $request->session()->forget('success');
        $request->session()->forget('username');
        Auth::logout();
        return redirect('/');
    }
}
