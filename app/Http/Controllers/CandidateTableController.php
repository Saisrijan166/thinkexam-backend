<?php

namespace App\Http\Controllers;

use App\Services\CandidateTableService;
use Illuminate\Http\Request;

class CandidateTableController extends Controller
{
    protected $candidateService;

    public function __construct(CandidateTableService $candidateService)
    {
        $this->candidateService = $candidateService;
    }

    /**
     * @OA\Get(
     *     path="/api/candidatetable",
     *     summary="Get paginated list of candidates",
     * security={{"sanctum":{}}},
     *     tags={"CandidateTable"},
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Number of candidates per page",
     *         required=false,
     *         @OA\Schema(type="integer", default=15)
     *     ),
     *     @OA\Response(response=200, description="Successful response with paginated candidates list"),
     *     @OA\Response(response=500, description="Internal server error")
     * )
     */
    public function candidateTable(Request $request)
    {
        $perPage = $request->query('perPage', 15);
        return response()->json($this->candidateService->getAll($perPage));
    }

    /**
     * @OA\Get(
     *     path="/api/getcandidates",
     *     summary="Get filtered candidates",
     * security={{"sanctum":{}}},
     *     tags={"CandidateTable"},
     *     @OA\Parameter(
     *         name="filter",
     *         in="query",
     *         description="Filter criteria",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Filtered candidates list"),
     *     @OA\Response(response=500, description="Internal server error")
     * )
     */
    public function getFilteredCandidates(Request $request)
    {
        $filter = $request->query('filter');
        return response()->json($this->candidateService->getFilteredCandidates($filter));
    }

    /**
     * @OA\Delete(
     *     path="/api/deletecandidate/{id}",
     *     summary="Delete a candidate",
     * security={{"sanctum":{}}},
     *     tags={"CandidateTable"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Candidate ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Candidate deleted successfully"),
     *     @OA\Response(response=404, description="Candidate not found"),
     *     @OA\Response(response=500, description="Internal server error")
     * )
     */
    public function deleteCandidate($id)
    {
        $isDeleted = $this->candidateService->delete($id);
        return response()->json([
            'success' => (bool) $isDeleted,
            'message' => $isDeleted ? 'Candidate deleted successfully.' : 'Record not deleted'
        ]);
    }

    /**
     * @OA\Put(
     *     path="/api/editcandidate/{id}",
     *     summary="Update candidate details",
     * security={{"sanctum":{}}},
     *     tags={"CandidateTable"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Candidate ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email", "password"},
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string"),
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="enrollment", type="string"),
     *             @OA\Property(property="date_of_registration", type="string", format="date"),
     *             @OA\Property(property="phone", type="string"),
     *             @OA\Property(property="dob", type="string", format="date"),
     *             @OA\Property(property="gender", type="string", enum={"male", "female"}),
     *             @OA\Property(property="school_name", type="string"),
     *             @OA\Property(property="year", type="integer"),
     *             @OA\Property(property="session", type="string"),
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="country", type="string"),
     *             @OA\Property(property="state", type="string"),
     *             @OA\Property(property="city", type="string"),
     *             @OA\Property(property="pincode", type="string"),
     *             @OA\Property(property="group", type="string"),
     *             @OA\Property(property="other_selection", type="string"),
     *             @OA\Property(property="status", type="string", enum={"active", "inactive"})
     *         )
     *     ),
     *     @OA\Response(response=200, description="Candidate updated successfully"),
     *     @OA\Response(response=404, description="Candidate not found"),
     *     @OA\Response(response=500, description="Internal server error")
     * )
     */
    public function editCandidate(Request $request, $id)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'name' => 'nullable|string|max:255',
            'enrollment' => 'nullable|string|max:255',
            'date_of_registration' => 'nullable|date',
            'phone' => 'nullable|string|max:15',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string|in:male,female',
            'school_name' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'session' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:10',
            'group' => 'nullable|string|max:255',
            'other_selection' => 'nullable|string|max:255',
            'status' => 'nullable|string|in:active,inactive',
        ]);

        $updatedCandidate = $this->candidateService->update($id, $validated);

        if ($updatedCandidate) {
            return response()->json(['success' => true, 'message' => 'Candidate updated successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'Candidate not found.'], 404);
    }

    /**
     * @OA\Get(
     *     path="/api/searchCandidates",
     *     summary="Search for candidates",
     * security={{"sanctum":{}}},
     *     tags={"CandidateTable"},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Search term",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Search results"),
     *     @OA\Response(response=500, description="Internal server error")
     * )
     */
    public function searchCandidates(Request $request)
    {
        $search = $request->query('search');
        return response()->json($this->candidateService->search($search));
    }
}
