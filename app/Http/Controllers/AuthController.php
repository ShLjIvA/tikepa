<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\Logging;

class AuthController extends Controller
{
    use Logging;
    // Form
    public function index(){
        return view('pages.login');
    }
    // Log in
    public function doLogin(LoginRequest $request){
        $email = $request->input('emailLogin');
        $password = md5($request->input('passwordLogin'));

        try {
            $user = DB::table('users')
                ->where('email', '=', $email)
                ->where('password', '=', $password)->first();
            if(!$user){
                return redirect()->back()->with('error-msg', 'Incorrect password or email address. Please try again wtih diffrent.');
            }
            // User session
            $request->session()->put('user', $user);
            $this->insertLog($user->id, 'Logged In', $request->getUri());
            if($request->session()->get('user')->admin){
                return redirect()->route('admin');
            }
            else {
                if(session()->has('cartItems') && count(session()->get('cartItems')))
                    return redirect()->route('cart');
                else
                    return redirect()->route('home');
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error-msg', $e->getMessage());
        }

    }
    // Log out
    public function doLogout(Request $request){
        if($request->session()->has('user')){
            $user = $request->session()->get('user');
            $this->insertLog($user->id, 'Logged Out', $request->getUri());
            $request->session()->forget('user');
        }
        return redirect()->route('login');
    }
}
