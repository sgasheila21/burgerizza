<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use function PHPUnit\Framework\isEmpty;

class AddressController extends Controller
{
    public function address(Request $request){
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required|max:100',
            'phone_number' => 'required|digits_between:9,15|numeric',
            'address' => 'required'
        ],
        [
            'name.required' => 'The name field is required',
            'name.max' => 'The maximum length of name field is 100 characters.',
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.digits_between' => 'The length of phone number field is between 9 to 15 characters.',
            'phone_number.numeric' => 'Must be number!',
            'address.required' => 'The address field is required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator, 'add_errors');
        }

        if(auth()->user()->addresses->isEmpty()){
            Address::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'user_id' => auth()->user()->id,
                'is_main' => 1
            ]);
        }
        else{
            Address::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'user_id' => auth()->user()->id,
                'is_main' => 0
            ]);
        }
        return redirect()->back()->with('success','Address successfully added!');
    }

    public function editAddress($id, Request $request){
        $this_address = Address::find($id);

        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required|max:100',
            'phone_number' => 'required|digits_between:9,15|numeric',
            'address' => 'required'
        ],
        [
            'name.required' => 'The name field is required',
            'name.max' => 'The maximum length of name field is 100 characters.',
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.digits_between' => 'The length of phone number field is between 9 to 15 characters.',
            'phone_number.numeric' => 'Must be number!',
            'address.required' => 'The address field is required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator, 'edit_errors');
        }

        if ($request->has('btnSave')){
            if($request->has('isMain')){
                if($this_address->is_main == 0){
                    $first_address = Address::where('is_main',1)->first();
                    $first_address->is_main = 0;
                    $first_address->save();
                }
                $this_address->is_main = 1;
            }

            $this_address->name = $request->name;
            $this_address->phone_number = $request->phone_number;
            $this_address->address = $request->address;
            $this_address->save();
            return redirect()->back()->with('success','Address successfully edited!');
        }
        else if ($request->has('btnCancel')){
            return redirect()->back()->with('failure', 'Update canceled!');
        }
    }

    public function deleteAddress($id, Request $request){
        if ($request->has('btnYes')){
            $address = Address::find($id);
            if($address->is_main == 1){
                $deleted = $address->delete();
                $first_address = Address::first();
                $first_address->is_main = 1;
                $first_address->save();
            }
            else{
                $deleted = $address->delete();
            }

            if($deleted){
                return redirect()->back()->with('success', 'Address Has Been Deleted!');
            }
            else{
                return redirect()->back()->with('failure', 'Failed to Delete Address!');
            }
        }
        else if ($request->has('btnCancel')){
            return redirect()->back()->with('failure', 'Deletion canceled!');
        }
    }
}
