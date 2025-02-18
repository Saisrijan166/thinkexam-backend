<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateTableController extends Controller
{
    protected $candidate;
    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
    }
    public function candidatetable(Request $request)
    {
        $perPage = $request->query('perPage', 15);
        $candidates = $this->candidate->paginate($perPage);
        return response()->json($candidates);
    }

    public function getFilteredCandidates(Request $request)
    {
        $filter = $request->query('filter');

        $query = $this->candidate->query();

        if ($filter === 'A' || $filter === 'B' || $filter === 'C') {
            $query->where('group', $filter);
        } elseif (in_array($filter, ['active', 'inactive'])) {
            $query->where('status', $filter);
        }

        $candidates = $query->get();

        return response()->json($candidates);
    }

    public function deleteCandidate($id)
    {
        $isDelete = $this->candidate->destroy($id);

        if ($isDelete) {
            $updatedTableData = $this->candidate->all();
            return response()->json([
                'success' => true,
                'data' => $updatedTableData
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Record not deleted'
            ]);
        }
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

        $candidate = $this->candidate->find($id);

        if (!$candidate) {
            return response()->json(['success' => false, 'message' => 'Candidate not found.'], 404);
        }

        $candidate->update($validated);

        return response()->json(['success' => true, 'message' => 'Candidate updated successfully.']);
    }

    public function addCandidate(Request $request)
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

        try {
            $candidate = $this->candidate->create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Candidate added successfully.',
                'data' => $candidate,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error occurred while adding candidate: ' . $e->getMessage(),
            ], 500);
        }
    }
}
