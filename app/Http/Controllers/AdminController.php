<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use Auth;

class AdminController extends Controller
{
	  use AuthenticatesUsers;
    //
    // public function login(Request $request) {
    // 	$credentials = $request->only('email','password');
    // 	if(Auth::guard('admin')->attempt($credentials, $request->remember)) {
    // 		$user = Admin::where('email', $request->email) ->first();
    // 		Auth::guard('admin')->login($user);
    // 		return redirect()->route('admin.home');
    // 	}
    // 	return redirect()->route('admin.login')->with('status', 'Failed to Process Login');
    // }
    // public function logout() {
      // $guards = array_keys(config('auth.guards'));
    // 	if(Auth::guard('admin')->logout()) {
    // 		return redirect()->route('admin.login')->with('status','Logout Successfully!');
    // 	}
    // }



  protected function authenticated(Request $request, $user)
    {
        //
         return redirect()->route('admin.home');
    }

/////////////////////////////////////////////////////////
	public function logout(Request $request)
    {
        $this->guard()->logout();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }
///////////////////////////////////////////////////////

    protected function loggedOut(Request $request)
    {
        return redirect()->route('admin.login');
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
