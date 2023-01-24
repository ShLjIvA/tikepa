<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // Form
    public function index(){
        return view('pages.login');
    }
    // Log in
    public function doLogin(LoginRequest $request){
        $email = $request->input('emailLogin');
        $password = md5($request->input('passwordLogin'));
              //  dd($password);

        try {
            $user = DB::table('users')
            //    ->join('roles', 'users.id_role', '=', 'roles.id')
                ->where('email', '=', $email)
                ->where('password', '=', $password)->first();
            // dd($user);
            if(!$user){
                return redirect()->back()->with('error-msg', 'Incorrect password or email address. Please try again wtih diffrent.');
            }
            // User session
            $request->session()->put('user', $user);
            $request->session()->put('cartItems', []);
//            dd($request->session()->get('user')->email);
            if($request->session()->get('user')->admin == 1){
                return redirect()->route('admin-panel');
            }
            else {
                return redirect()->back()->with('success-msg', "You've successfully logged in to your account.");
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error-msg', $e->getMessage());
        }

    }
    // Log out
    public function doLogout(Request $request){
        if($request->session()->has('user')){
            $request->session()->forget('user');
        }
        return redirect()->route('login');
    }
}
