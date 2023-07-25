<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        
        $input=$request->all();
        $this->validate($request,[
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ],[
            'email'=>'Please Enter Valid Email Address.'
        ]);
        if(auth()->attempt(array(
            'email' => $input['email'],
            'password' => $input['password']
        )))
        {
            if(auth()->user()->role=='admin'){
                return redirect()->route('admin.dashboard');
            }
            else{
                return redirect()->route('university.home');;
            }
        }else {
            return redirect()->back()->withErrors(['error' => 'Incorrect Password']);
 
        }
        
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login'); // Change 'custom-redirect-route' to your desired route
    }
}
