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

    public function delete($id)
{
    $report = Report::find($id);

    if (!$report) {
        return response()->json([
            'success' => false,
            'message' => 'Record not found'
        ], 404);
    }

    if ($report->delete()) {
        return response()->json([
            'success' => true,
            'message' => 'Record deleted successfully'
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Failed to delete the record'
    ], 500);
}


public function count() {
    return response()->json(['count' => Report::count()]);
}


}
