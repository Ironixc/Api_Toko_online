<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Hash;
use Illuminate\Validation\Rule;
use Auth;

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
    function getuser(){
        try {
            $users = User::get();
            return response()->json(['status' => true, 'data' => $users]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Error']);
        }
    }

    function getuserid($id){
        try {
            $users = User::where('id',$id)->first();
            return response()->json(['status' => true, 'data' => $users]);
        } catch (Exepciton $e) {
            return response()->json(['status' => false, 'message'=>'gagal load data detail user. '. $e,
        ]);
        }
    }

    function update($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email'=>['required', Rule::unique('users')->ignore($id)],
            'password' => 'min:8',
            'role' => 'required',
            'Adrees' => 'required',
            'phone' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->messages]);
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
            $update = User::where('id', $id)->update($data);
            return response()->json(['status' => true, 'message' => 'User updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Error']);
        }
    }

    function delete($id){
        try {
            $delete = User::where('id', $id)->delete();
            return response()->json(['status' => true, 'message' => 'User deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Error']);
        }
    }

    function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>$validator->errors(),
            ]);
        }
        $credentials = $request->only('email', 'password');
        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json(['status' => false, 'message' => 'Invalid credentials'],);
        }

        $users = Auth::guard('api')->user();
        return response()->json([
            'status'=> true,
            'message'=> "ye login",
            'data'=>$users,
            'authorisation'=>[
                'token'=>$token,
            ]
        ]);
    }

    function logout(){
        Auth::guard('api')->logout();
        return response()->json([
            'status'=>true,
            'message'=>'User logged out successfully',
        ]);
    }

}
