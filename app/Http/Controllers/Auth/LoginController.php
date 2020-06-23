<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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
        $this->middleware('guest:gerente')->except('logout');
    }

    public function authenticateG(Request $request)
    {
        $credentials =  request()->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        //dd($credentials['email']);
        if(Auth::guard('gerente')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])){
            dd(Auth::guard('gerente')->guest());
            return redirect()->intended('/home');
        }
        //auth()->guard('gerente')->attempt($credentials);
        dd(Auth::check());
        // Authentication passed...
        return redirect(url('/login_g'));


    }

    public function showLoginForm()
    {
        return view('auth_gerente.login');
    }

}
