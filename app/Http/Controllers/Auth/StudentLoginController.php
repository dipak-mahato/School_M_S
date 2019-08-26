<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLoginController extends Controller
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
    protected $redirectTo = '/studenthome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
        protected function attemptLogin(Request $request)
    {
        return $this->guard('student')->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }
    

 
    public function showLoginForm()
    {
        return view('student.login');
    }
 
        protected function guard()
    {
        return Auth::guard('student');
    }


        protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard('student')->user())
                ?: redirect()->intended($this->redirectPath());
    }
        public function __construct()
    {
        $this->middleware('studentguest:student')->except('logout');
    }

}
