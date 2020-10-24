<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
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

    /**
     * for phone
     * @return string
     */
    public function username()
    {
        return 'phone';
    }

    /**
     * Over write login view
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        $setting = Setting::find(1);
        return view('auth.login',compact('setting'));
    }
    /**
     * Over write login
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if($this->guard()->validate($this->credentials($request))) {
            if(Auth::attempt(['phone' => $request->phone, 'password' => $request->password, 'status' => 1])) {
                Auth::user()->last_login_at = Carbon::now();
                Auth::user()->save();
                session()->flash('message', 'Login success.');
                session()->flash('type', 'success');
                return redirect(route('backend.dashboard.index'));
            }  else {
                $this->incrementLoginAttempts($request);
                session()->flash('message', 'This account is not activated.');
                session()->flash('type', 'warning');
                return redirect()->back();
            }
        } else {
            $this->incrementLoginAttempts($request);
            session()->flash('message', 'Credentials do not match our database.');
            session()->flash('type', 'warning');
            return redirect()->back();
        }
    }
}
