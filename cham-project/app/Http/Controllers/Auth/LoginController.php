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

    use AuthenticatesUsers {
        logout as performLogout;
    }

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

    public function username() {
        return 'username';
    }

    protected function login(Request $request)
    {
        $credientials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credientials)) {
            $is_admin = Auth::user()->is_admin;

            if ($is_admin) {
                return redirect('/admin');
            } else {
                return redirect('/kongtun/summary');
            }
            
        } else {
            redirect('/');
        }
        return redirect()->back()->with('error', 'Wrong username or password');
    }

    public function logout(Request $request)
    {
        $redicrect = '/kongtun/login';
        if (Auth::user() && Auth::user()->is_admin) {
            $redicrect = '/admin';
        }
        $this->performLogout($request);
        return redirect($redicrect);
    }
}
