<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    // index
    public function index(){
        if(Auth::check()){  return redirect('home'); }
        return view('register');
    }

    public function validation (Request $request) {
        $validateData = $request->validate([
            'username' => 'required|max:100',
            'email' => 'required|email',
            'phone_number' => 'required|digits_between:9,15|numeric',
            'password' => 'required|min:8|max:20',
            'c_password' => 'required|min:8|max:20'
        ],
        [
            'username.required' => 'The username field is required',
            'username.max' => 'The maximum length of username field is 100 characters.',
            'email.required' => 'The email field is required.',
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.digits_between' => 'The length of phone number field is between 9 to 15 characters.',
            'phone_number.numeric' => 'Must be number!',
            'password.required' => 'The password field is required',
            'password.min' => 'The minimum length of password field is 8 characters.',
            'password.max' => 'The maximum length of password field is 20 characters.',
            'c_password.required' => 'The password field is required',
            'c_password.min' => 'The minimum length of confirm password field is 8 characters.',
            'c_password.max' => 'The maximum length of confirm password field is 20 characters.'
        ]);

        $customer = User::where('email', $request->email)->first();

        if (!is_null($customer) && ($request->email == $customer->email)){
            return back()->withErrors(['message' => 'Your account is already registered! Go to login page.'])->withInput();
        }
        else if (is_null($customer) && $request->password != $request->c_password){
            return back()->withErrors(['message' => "Your password and confirm password doesn't match"])->withInput();
        }
        else if (is_null($customer) && $request->password == $request->c_password){
            $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
            
            DB::table('users')->insert([
                'username' => $request->username,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => bcrypt($request->password),
                'role_id' => 1
            ]);

            session()->put('success', 'Your account is successfully registered!');
            return view('home', compact('customer'))->with('categories',$categories);
        }
    }
}
