<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use DB;

class AuthController extends Controller
{
  public $successStatus = 200;
    //register api
    public function register(Request $request){

        $validator = Validator::make($request->all(),
        [
             'email' => 'required|string|email|max:254|unique:users',
             'name' => 'required|string|max:254',
             'phone' => 'required',
             'password' => 'required',
        ]);
 
        $attributeNames = array(
             'email' => 'Email Address',
        );

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

        $user_exists = User::where('email',$request->email)->first();

        if(!is_null($user_exists)){
          return response()->json(['error'=>'Email already exists'],401);
        }

          $data = ([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'customer',
            'status' => 1 
          ]);

        if($request->has('city')){
            $data += ['city' => $request->city];
        }
        if($request->has('address')){
            $data +=  ['address' => $request->address];
        }
   
        $user = User::create($data); 
        $success['token'] =  $user->createToken('Laravel Personal Access Client')->accessToken; 
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this->successStatus);
    } 

    // login api
    public function login(){
      if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        $user = Auth::user();
        $success['token'] = $user->createToken('Laravel Personal Access Client')->accessToken;
        $success['name'] = $user->name;
      return response()->json(['success'=>$success],$this->successStatus);
      }
      else{
        return response()->json(['error'=>'Unauthorised'],401);
      }
    }
  
    // user logout api
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'success' => 'Successfully Logout!'
        ]); 
     }
}
