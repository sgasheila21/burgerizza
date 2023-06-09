<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout(Request $request){
        if(Auth::user()) {
            session()->put('info','Logout Success!');
            Auth::logout();
        }
        return redirect('/login');
    }

    public function profile()
    {
        $categories = Category::all()->where( strtolower('category_status'), '=', 'active');
        $user = Auth::user();
        return view('/profile',compact('categories','user'));
    }


    public function editProfile(Request $request)
    {           
        if (!$request->filled('username') && !$request->filled('email') && !$request->filled('phone_number')) {
            return redirect()->back()->withErrors(['message' => 'Please update at least one profile field.'])->withInput();
        }

        if (is_null($request['username'])) {
            unset($request['username']);
        }
        
        if (is_null($request['email'])) {
            unset($request['email']);
        }
        
        if (is_null($request['phone_number'])) {
            unset($request['phone_number']);
        }
        

        $validatedData = $request->validate([
            'username' => 'sometimes|required|max:100',
            'email' => 'sometimes|required|email',
            'phone_number' => 'sometimes|required|digits_between:9,15|numeric',
        ], [
            'username.max' => 'The maximum length of the username field is 100 characters.',
            'phone_number.digits_between' => 'The length of the phone number field should be between 9 and 15 characters.',
            'phone_number.numeric' => 'The phone number must be numeric.',
        ]);
        
        
        $customer = User::where('email', $request->email)->first();
        $curruser = Auth::user();
        $user = User::find($curruser->id);
        if (!is_null($customer) && ($request->email == $customer->email)){
            return back()->withErrors(['message' => 'email is already in use, use another email'])->withInput();
        }
        
        if ($request->filled('username')) {
            $user->username = $request->input('username');
        }


        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }

        if ($request->filled('phone_number')) {
            $user->phone_number = $request->input('phone_number');
        }
        $user->save();
        session()->flash('successprofile', 'Your profile has been changed successfully.');


        return redirect('/profile');




        return redirect('/profile')->withInput(['message' => 'Update Password  Sucessful']);
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'o_password' => 'required',
            'n_password' => 'required|min:8',
            'cn_password' => 'required|same:n_password',
        ]);
    
        $curruser = Auth::user();
        $user = User::find($curruser->id);
    
        if (!password_verify($request->input('o_password'), $user->password)) {
            return redirect()->back()->withErrors(['o_password' => 'The old password is incorrect.']);
        }
    
        $user->password = bcrypt($request->input('n_password'));
        $user->save();

        session()->flash('successpass', 'Your password has been changed successfully.');
    
        return redirect('/profile');
    }

}
