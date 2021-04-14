<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class userController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return response()->json([
            "res" => true,
            "data" => $users
        ], status:200);
    }

    public function show($email){
        
        $user = User::firstWhere('email', $email);
        
        if (!$user) {
            return response()->json([
                "res" => false,
                "message" => "Ingresa un email que exista"
            ], status:500);
        }

        return response()->json([
            'res' => true,
            'data' => $user
        ], 200);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'type' => ['required','in:user,admin'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "res" => false,
                "message" => "User cannot be created, check the email or type (user,admin)"
            ], status:500);
        }

        User::create($request->all());
        return response()->json([
            "res" => true,
            "message" => "User created succesfully"
        ], status:201);

    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'res' => true,
            'message' => "Usuario borrado correctamente"
        ], 204);
    }
}
