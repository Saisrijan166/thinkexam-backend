<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{

    protected $report;
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 15);
        $reports = $this->report->paginate($perPage);

        return response()->json($reports);
    }

    public function delete($id)
    {
        $report = $this->report->find($id);

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


    public function count()
    {
        return response()->json(['count' => $this->report->count()]);
    }


    public function export()
    {
        $reports = $this->report->all();
        if ($reports->isEmpty()) {
            return response()->json(['message' => 'No data available'], 404);
        }
        return response()->json($reports);
    }

    public function getGroupReports(Request $request)
    {
        $filter = $request->query('filter');

        $query = $this->report->query();
        if ($filter) {
            $query->where('group', 'LIKE', "%$filter%");
        }

        $tests = $query->get();

        return response()->json($tests);
    }


    public function getCredibilityReports(Request $request)
    {
        $filter = $request->query('filter');

        $query = $this->report->query();

        if ($filter === 'above70') {
            $query->where('credibility_score', '>', 70);
        } elseif ($filter === '30-70') {
            $query->whereBetween('credibility_score', [30, 70]);
        } elseif ($filter === 'below30') {
            $query->where('credibility_score', '<', 30);
        }

        $tests = $query->get();

        return response()->json($tests);
    }


    public function getEmails(Request $request)
    {
        $group = $request->input('group', 'A');
        $emails = $this->report->where('group', $group)->pluck('email');
        return response()->json($emails);
    }
}
