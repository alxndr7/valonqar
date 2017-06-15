<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ClienteLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:cliente');
        //$this->middleware('guest', ['middleware' => ['auth', 'role:cliente']]);
        //['middleware' => ['auth', 'role:admin']];
    }

    public function showLoginForm(){
        return view('auth.cliente-login');
    }

    public function login(Request $request){
        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' =>'required|min:6'

        ]);
        //attempt to log the user in

        if(Auth::guard('cliente')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            //if successful, then redirect to their intented location

            return redirect()->intended(route('cliente.dashboard'));

        }

        //if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email','remember'));

    }
}
