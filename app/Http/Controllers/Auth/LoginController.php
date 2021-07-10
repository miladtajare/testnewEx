<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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

        if( filter_var( $request->input('loginData'), FILTER_VALIDATE_EMAIL ) )
        { $login_type = 'email'; }
       
        elseif( $this->passes($request->input('loginData')) == true ) 
        { $login_type = 'nationalCode'; }
       
        else
        { $login_type = 'userName'; }
        
	    $request->merge([ $login_type => $request->input('loginData') ]);
        $credentials = [ $login_type => $request['loginData'], 'password' => $request['password'], ];

        if (Auth::attempt($credentials)) { return redirect('/Panel'); }

        alert()->error('ورودی اشتباه است','خطا');
        return back();
    }


    public function passes($code)
    {
        if (!preg_match('/^[0-9]{10}$/', $code))
        return false;
        for ($i = 0; $i < 10; $i++)
        if (preg_match('/^' . $i . '{10}$/', $code))
        return false;
        for ($i = 0, $sum = 0; $i < 9; $i++)
                    $sum += ((10 - $i) * intval(substr($code, $i, 1)));
                $ret = $sum % 11;
                $parity = intval(substr($code, 9, 1));
        if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity))
        return true;
        return false;
    }


}
