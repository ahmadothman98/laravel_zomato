<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
 
use Illuminate\Database\QueryException;

class UsersController extends Controller
{   
    public function signUp(Request $request){
        try{//if email already exists, return error messag
            $user = new User;
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->bio = $request->bio;
            $user->profile_pic = $request->profile_pic;
            $user->email = $request ->email;
            $user->date_of_birth = $request ->dob;
            $user->password = Hash::make($request ->password);
            $user->admin = $request -> admin;
            $user->save();
            return response() ->json([
                "status" => "Success",
                "users" => $user
            ],200);
        }
        catch (QueryException $e){
            $error_code = $e->errorInfo[1];
            if($error_code == 1062){
                return response() ->json([
                    "status" => "duplicate entry"
                ]);
            }
        }
    }
    public function login(Request $request){
        $email = $request->email;
        $password = Hash::make($request->password);
        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                return response() ->json([
                    "status" => "Success",
                    "user_id" => $user->id
                ],200);
            }
            else{
                    return response() ->json([
                        "status" => "Fail"
                    ],200);
            }
        }
        else{
            return response() ->json([
                "status" => "Fail"
            ],200);
        }


    }
}
