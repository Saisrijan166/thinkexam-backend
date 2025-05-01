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

    /**
     * @OA\Get(
     *     path="/api/reports",
     *     summary="Get reports with pagination",
     *     tags={"Reports"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Number of records per page",
     *         required=false,
     *         @OA\Schema(type="integer", default=15)
     *     ),
     *     @OA\Response(response=200, description="Successful response"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function reportsTable(Request $request)
    {
        $perPage = $request->input('perPage', 15);
        $result = $this->reportService->getAll($perPage);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json($result);
    }

    /**
     * @OA\Delete(
     *     path="/api/deleterecord/{id}",
     *     summary="Delete a report by ID",
     *     tags={"Reports"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the report to delete",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Record deleted successfully"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function delete($id)
    {
        $result = $this->reportService->delete($id);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'message' => 'Record deleted successfully']);
    }

    /**
     * @OA\Get(
     *     path="/api/reports/count",
     *     summary="Get the total count of reports",
     *     tags={"Dashboard"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Returns the count of reports"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function count()
    {
        $result = $this->reportService->count();

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'count' => $result]);
    }

    /**
     * @OA\Get(
     *     path="/api/reports/export",
     *     summary="Export reports",
     *     tags={"Reports"},
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Exported reports"),
     *     @OA\Response(response=404, description="No data available")
     * )
     */
    public function exportReports()
    {
        $reports = $this->reportService->export();

        if ($reports->isEmpty()) {
            return response()->json(['message' => 'No data available'], 404);
        }

        return response()->json($reports);
    }

    /**
     * @OA\Get(
     *     path="/api/getgroupreports",
     *     summary="Get group reports",
     *     tags={"Reports"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="filter",
     *         in="query",
     *         description="Filter parameter",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Returns group reports"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function getGroupReports(Request $request)
    {
        $filter = $request->query('filter');
        $result = $this->reportService->getGroupReports($filter);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'data' => $result]);
    }

    /**
     * @OA\Get(
     *     path="/api/getcredibilityreports",
     *     summary="Get credibility reports",
     *     tags={"Reports"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="filter",
     *         in="query",
     *         description="Filter parameter",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Returns credibility reports"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function getCredibilityReports(Request $request)
    {
        $filter = $request->query('filter');
        $result = $this->reportService->getCredibilityReports($filter);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'data' => $result]);
    }

    /**
     * @OA\Get(
     *     path="/api/getemails",
     *     summary="Get emails by group",
     *     tags={"Reports"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="group",
     *         in="query",
     *         description="Group filter (default: A)",
     *         required=false,
     *         @OA\Schema(type="string", default="A")
     *     ),
     *     @OA\Response(response=200, description="Returns emails"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function getEmails(Request $request)
    {
        $group = $request->input('group', 'A');
        $result = $this->reportService->getEmails($group);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'data' => $result]);
    }

    /**
     * @OA\Get(
     *     path="/api/searchReports",
     *     summary="Search reports",
     *     tags={"Reports"},
     *     security={{"sanctum":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Search query",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Returns search results"),
     *     @OA\Response(response=500, description="Server error")
     * )
     */
    public function searchReports(Request $request)
    {
        $search = $request->query('search');
        $result = $this->reportService->search($search);

        return isset($result['error'])
            ? response()->json(['success' => false, 'message' => $result['error']], 500)
            : response()->json(['success' => true, 'data' => $result]);
    }
}
