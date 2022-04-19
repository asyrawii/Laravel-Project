<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    //Get a list of all cars
    function getAllCar(){
        try{
            return view('carlist',['car'=>DB::table('car')->paginate(5)]);
        }
        catch(\Exception){
            return redirect()->back() ->with('alert', 'Failed to get all car');
        }

    }

    //Register vehicle
    function timeIn(Request $req){

    }
    //Stamp out vehicle
    function timeOut(Request $req){

    }
    //Search car based on plate number or card number
    function search(Request $req){
        return view('viewcar',['users'=>DB::table('car')
        ->select(DB::raw('id, name, email, password, created_at'))
        ->where('plate_number','like','%'.$req->search.'%')
        ->orwhere('card_number','like','%'.$req->search.'%')->paginate(5)]
        );
    }
}
