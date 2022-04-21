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
        try{
            DB::insert('insert into car (card_number, plate_number, created_at) values (?,?,?)',
            [$req->card_number,$req->plate_number,now()]);
            return redirect()->back();
        }
        catch(\Exception){
            return redirect()->back() ->with('alert', 'Failed to clock in');
        }

    }
    //Stamp out vehicle
    function timeOut(Request $req){
        try{
            DB::table('car')->where('card_number', $req->card_number)
            ->orwhere('plate_number', $req->plate_number)
            ->update(array(
            'updated_at' => DB::raw('now()')));
        }
        catch(\Exception){
            return redirect()->back() ->with('alert', 'Failed to clock out');
        }


    }
    //Search car based on plate number or card number
    function search(Request $req){
        return view('carlist',['car'=>DB::table('car')
        ->select(DB::raw('id, plate_number, card_number, created_at, updated_at'))
        ->where('plate_number','like','%'.$req->search.'%')
        ->orwhere('card_number','like','%'.$req->search.'%')->paginate(5)]);
    }
}
