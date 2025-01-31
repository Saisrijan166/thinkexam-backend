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

        // Append the full URL of the images
        foreach ($reports as $report) {
            $report->verified_image_url = asset('storage/' . $report->verified_image);
            $report->candidate_image_1_url = asset('storage/' . $report->candidate_image_1);
            $report->candidate_image_2_url = asset('storage/' . $report->candidate_image_2);
        }

        return response()->json($reports);
    }

}
