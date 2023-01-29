<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\Logging;


class RegisterController extends Controller
{
    use Logging;

    public function index(){
        return view('pages.register');
    }

    public function store(RegisterRequest $request){
        $validatedEmail = $request->safe()->only(['name', 'emailRegister']);
        $validatedPassword = $request->safe()->only(['name', 'passwordRegister']);
        $validatedPassword['passwordRegister'] = md5($validatedPassword['passwordRegister']);
        $validatedFirstName = $request->safe()->only(['name', 'firstName']);
        $validatedLastName = $request->safe()->only(['name', 'lastName']);
 //       dd($validatedPassword);
        try {
            DB::beginTransaction();
            $id = DB::table('users')->insertGetId([
                'email' => $validatedEmail['emailRegister'],
                'password' => $validatedPassword['passwordRegister'],
                'first_name' => $validatedFirstName['firstName'],
                'last_name' => $validatedLastName['lastName'],
                'admin' => 0
            ]);
            DB::commit();
            $this->insertLog($id, 'Registered', $request->getUri());

        }
        catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error-msg', $e->getMessage());
        }

        return back()->with("success-msg", "You've successfully registered!");
    }
}
