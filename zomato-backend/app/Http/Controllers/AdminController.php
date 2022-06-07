<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function viewUsers(){
        $users = user::all();
        return response() -> json([
            "status" => "sucess",
            "users" => $users
        ],200);
    }
}
