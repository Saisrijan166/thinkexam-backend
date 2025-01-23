<?php

namespace App\Http\Controllers;

use App\Models\teststable;
use Illuminate\Http\Request;

class TestsTableControlller extends Controller
{
    public function teststable(){
        $tests= teststable::paginate(10); 
        return response()->json($tests);
    }
}
