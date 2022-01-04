<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Listeners\Listeners;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use App\Listeners\AssignRoleForRegisteredUser;

class LoginController extends Controller
{
    protected $user;
    protected $id;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        $role = RoleUser::where('user_id', auth()->user()->id)->first();
        // dd($role->role_id );
        if ($role->role_id == '1') {
            return RouteServiceProvider::HOME;
        }else if ($role->role_id == '2') {
            return RouteServiceProvider::USER;
        }else if ($role->role_id == '3') {
            dd("Staff Here");
        }
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
