<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function upload(request $request){
        $path =  $request->file('file')->store('public');
        return $path;
    }
}
