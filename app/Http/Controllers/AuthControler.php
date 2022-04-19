<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthControler extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'password'=>'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)  
        ]);

        $token = $user->createToken('registracija_token')->plainTextToken;
       // return response()->json(['data'=>$user, 'access_token'=>$token, 'token_type'=>'Bearer']);//ispisuje se u Postmanu

       $response = [
        'user' => $user,
        'token' => $token,
    ];

    return response()->json($response);
    }

    public function login(Request $request)
    {
        /*
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        */ //proveri za ovo!!!
        if(!Auth::attempt($request->only('email', 'password'))){
            return response()->json(['message'=>'Pogresan email ili lozinka!'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token =  $user->createToken('login_token')->plainTextToken;

      //  return response()->json(['message'=>'Welcome!','access_token'=>$token, 'token_type'=>'Bearer']);

      $response = [
        'User informations:' => $user,
        'Login token: ' => $token,
    ];

    return response()->json($response);
    }

    public function logout()
    {
      auth()->user()->tokens()->delete();
      // return response()->json('You are logged out! Goodbye!')
      return ['message'=>'You are logged out! Goodbye!'];
    }
}
