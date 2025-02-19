<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReportTableService;

class ReportController extends Controller
{
    protected $reportService;

    public function __construct(ReportTableService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function reportsTable(Request $request)
    {
        $perPage = $request->input('perPage', 15);
        $result = $this->reportService->getAll($perPage);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json($result);
    }

    public function delete($id)
    {
        $result = $this->reportService->delete($id);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'message' => 'Record deleted successfully']);
    }

    public function count()
    {
        $result = $this->reportService->count();

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'count' => $result]);
    }

    public function exportReports()
    {
        $reports = $this->reportService->export();

        if ($reports->isEmpty()) {
            return response()->json(['message' => 'No data available'], 404);
        }

        return response()->json($reports);
    }

    public function getGroupReports(Request $request)
    {
        $filter = $request->query('filter');
        $result = $this->reportService->getGroupReports($filter);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'data' => $result]);
    }

    public function getCredibilityReports(Request $request)
    {
        $filter = $request->query('filter');
        $result = $this->reportService->getCredibilityReports($filter);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'data' => $result]);
    }

    public function getEmails(Request $request)
    {
        $group = $request->input('group', 'A');
        $result = $this->reportService->getEmails($group);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'data' => $result]);
    }

    public function searchReports(Request $request)
    {
        $search = $request->query('search');
        $result = $this->reportService->search($search);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'data' => $result]);
    }
}
