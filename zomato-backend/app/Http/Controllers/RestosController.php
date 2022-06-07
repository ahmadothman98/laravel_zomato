<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resto;


class RestosController extends Controller
{
    public function getRestos($id = null){
        if($id !=null){
            $restos = Resto::find($id);
        }
        else{
            $restos = resto::all();
        }
        return response() ->json([
            "status" => "Success",
            "Restos" => $restos
        ],200);
    }

    public function addResto(Request $request){

        $resto = new Resto;
        $resto -> name = $request -> name;
        $resto -> address = $request -> address;
        $resto -> catagories = $request -> catagories;
        $resto -> rating = $request -> rating;
        $resto -> logo = $request -> logo;
        $resto -> save();

        return response() -> json([
            "status" => "success"
        ],200);

    }
}

