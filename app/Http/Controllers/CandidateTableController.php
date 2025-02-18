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

    public function candidateTable(Request $request)
    {
        $perPage = $request->query('perPage', 15);
        return response()->json($this->candidateService->getAll($perPage));
    }

    public function getFilteredCandidates(Request $request)
    {
        $filter = $request->query('filter');
        return response()->json($this->candidateService->getFilteredCandidates($filter));
    }

    public function deleteCandidate($id)
    {
        $isDeleted = $this->candidateService->delete($id);
        return response()->json([
            'success' => (bool) $isDeleted,
            'message' => $isDeleted ? 'Candidate deleted successfully.' : 'Record not deleted'
        ]);
    }

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
}
