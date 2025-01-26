<?php

namespace App\Http\Controllers;

use App\Models\teststable;
use Illuminate\Http\Request;

class TestsTableControlller extends Controller
{
    public function teststable(Request $request)
    {
        $perPage = $request->query('perPage', 15);
        $tests = teststable::paginate($perPage);
        return response()->json($tests);
    }


    public function delete($id)
    {
        $isdelete = teststable::destroy($id);

        if ($isdelete) {
            $updatedTableData = teststable::all();
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



    public function edittest(Request $request, $id)
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


        $test = teststable::find($id);

        if (!$test) {
            return response()->json(['success' => false, 'message' => 'Test not found.'], 404);
        }

        $test->name = $request->input('name');
        $test->start_date = $request->input('start_date');
        $test->end_date = $request->input('end_date');
        $test->status = $request->input('status');
        $test->question = $request->input('question');
        $test->level = $request->input('level');
        $test->candidate = $request->input('candidate');
        $test->product = $request->input('product');
        $test->category = $request->input('category');
        $test->template = $request->input('template');
        $test->version = $request->input('version');

        if ($test->save()) {
            return response()->json(['success' => true, 'message' => 'Test updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update test.'], 500);
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
            $test = teststable::create([
                'name' => $validated['name'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'status' => $validated['status'],
                'level' => $validated['level'],
                'question' => $validated['question'],
                'candidate' => $validated['candidate'],
                'product' => $validated['product'],
                'category' => $validated['category'],
                'template' => $validated['template'],
                'version' => $validated['version'],
            ]);

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
}
