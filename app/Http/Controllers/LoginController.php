<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class LoginController extends Controller
{
    // index
    public function index(){
        if(Auth::check()){  return redirect('home'); }
        return view('login');
    }

    public function validation (Request $request) {
        $validateData = $request->validate([
            'email' => 'required|email:rfc,dns|exists:users',
            'password' => 'required|min:8|max:20',
        ],
        [
            'email.required' => 'The email field is required.',
            'password.required' => 'The password field is required',
            'password.min' => 'The minimum length of password field is 8 characters.',
            'password.max' => 'The maximum length of password field is 20 characters.'
        ]);

        $remember = isset($request->rememberMe);
        $customer = User::where('email', $request->email)->first();

        // if (!is_null($customer) && (Hash::check($request->password,  $customer->password))){
        //     return view('home', compact('customer'));
        // }
        // else 
        if (!is_null($customer) && (!Hash::check($request->password,  $customer->password))){
            return back()->withErrors(['message' => 'Your password is incorect!'])->withInput();
        }
        else if (is_null($customer)){
            return back()->withErrors(['message' => 'Your email is not registered! Please sign up first.'])->withInput();
        }

        if(Auth::attempt([ 
            'email' => $request->email, 
            'password' => $request->password 
        ], $remember)){ 
            return redirect('/home')->with('success','Login Success!');
        }
        else { //login gagal
            return redirect('/login')->withInput();
        }
    }
}
