<?php

namespace App\Http\Controllers;

use App\Services\TestsTableService;
use Illuminate\Http\Request;

class TestsTableController extends Controller
{
    protected $testsTableService;

    public function __construct(TestsTableService $testsTableService)
    {
        $this->testsTableService = $testsTableService;
    }

    public function testTable(Request $request)
    {
        return response()->json($this->testsTableService->getAll($request->query('perPage', 15)));
    }

    public function getFilteredTests(Request $request)
    {
        return response()->json($this->testsTableService->getFilteredTests($request->query('filter')));
    }

    public function getCategoryTests(Request $request)
    {
        return response()->json($this->testsTableService->getCategoryTests($request->query('filter')));
    }

    public function delete($id)
    {
        $isDeleted = $this->testsTableService->delete($id);

        if ($isDeleted) {
            return response()->json([
                'success' => true,
                'data' => $this->testsTableService->getAll()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Record not deleted'
            ]);
        }
    }

    public function editTest(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|string|in:Active,Inactive',
            'level' => 'required|string|in:Beginner,Intermediate,Advanced',
            'question' => ['required', function ($attribute, $value, $fail) {
                if (!is_string($value) && !is_int($value)) {
                    $fail($attribute . ' must be either a string or an integer.');
                }
            }],
            'candidate' => ['required', function ($attribute, $value, $fail) {
                if (!is_string($value) && !is_int($value)) {
                    $fail($attribute . ' must be either a string or an integer.');
                }
            }],
            'product' => 'required|string',
            'category' => 'required|string',
            'template' => 'required|string',
            'version' => 'required|string',
        ]);

        $updatedTest = $this->testsTableService->update($id, $validated);

        if ($updatedTest) {
            return response()->json(['success' => true, 'message' => 'Test updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Test not found.'], 404);
        }
    }

    public function addTest(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|string|in:Active,Inactive',
            'level' => 'required|string|in:Beginner,Intermediate,Advanced',
            'question' => ['required', function ($attribute, $value, $fail) {
                if (!is_string($value) && !is_int($value)) {
                    $fail($attribute . ' must be either a string or an integer.');
                }
            }],
            'candidate' => ['required', function ($attribute, $value, $fail) {
                if (!is_string($value) && !is_int($value)) {
                    $fail($attribute . ' must be either a string or an integer.');
                }
            }],
            'product' => 'required|string',
            'category' => 'required|string',
            'template' => 'required|string',
            'version' => 'required|string',
        ]);

        try {
            $test = $this->testsTableService->create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Test added successfully.',
                'data' => $test,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error occurred while adding test: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function countTests()
    {
        return response()->json(['count' => $this->testsTableService->count()]);
    }

    public function activeTestsCount()
    {
        return response()->json(['count' => $this->testsTableService->activeCount()]);
    }

    public function exportTests()
    {
        $reports = $this->testsTableService->export();

        if ($reports->isEmpty()) {
            return response()->json(['message' => 'No data available'], 404);
        }

        return response()->json($reports);
    }
}
