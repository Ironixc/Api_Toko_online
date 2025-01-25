<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
            'Adrees' => 'required',
            'phone' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'message' => $validator->messages()]);
            }
            $data = [
                'name'=>$request->get('name'),
                'email'=>$request->get('email'),
                'password'=>Hash::make($request->get('password')),
                'role'=>$request->get('role'),
                'Adrees'=>$request->get('Adrees'),
                'phone'=>$request->get('phone'),
            ];
            try {
                $insert = User::create($data);
                return response()->json(['status' => true, 'message' => 'User created successfully']);
            } catch (Exepciton $e) {
                return response()->json(['status' => false, 'message' => 'Error']);
            }
    }


}
