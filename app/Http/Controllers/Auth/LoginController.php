<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function login(Request $request)
    {
        $this->validate($request, [ 'loginData' => 'required', 'password' => 'required', ]);

        $login_type = filter_var($request->input('loginData'), FILTER_VALIDATE_EMAIL ) ? 'email' : 'username';
	    $request->merge([ $login_type => $request->input('loginData') ]);

        $credentials = [ $login_type => $request['loginData'], 'password' => $request['password'], ];

        if (Auth::attempt($credentials)) { return redirect('/dashboard'); }

        return back();
    }


}
