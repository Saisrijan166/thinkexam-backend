<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')->get();
        // $users = DB::table('users')->where('name','sai')->get();
        // return view('home', ['users' => $users]);
        // $response = DB::table('users')->insert(
        //     [
        //         'id'=> '3',
        //         'name'=> 'srijan',
        //         'email'=> 'srijan',
        //         'password'=> 'srijan',
        //     ]
        // );
        // if($response){
        //     echo "inserted successfully";
        // }
        // else{
        //     echo "insertion failed";
        // }

    }
    
}