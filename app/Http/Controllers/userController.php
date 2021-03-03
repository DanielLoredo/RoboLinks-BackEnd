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
        return $users;
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
            ], status:200);
        }

        User::create($request->all());
        return response()->json([
            "res" => true,
            "message" => "User created succesfully"
        ], status:200);

    }
}
