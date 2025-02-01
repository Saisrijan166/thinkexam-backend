<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    //
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 15);
        $reports = Report::paginate($perPage);

        return response()->json($reports);
    }

}
