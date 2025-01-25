<?php

namespace App\Http\Controllers;

use App\Models\teststable;
use Illuminate\Http\Request;

class TestsTableControlller extends Controller
{
    public function teststable(){
        $tests= teststable::paginate(15); 
        return response()->json($tests);
    }

    public function delete($id){
        $isdelete = teststable::destroy($id);

        if ($isdelete) {
            $updatedTableData = teststable::all();
            return response()->json([
                'success' => true,
                'data' => $updatedTableData
            ]);
        } 
        else {
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
        'end_date' => 'required|date',
        'status' => 'required|string',
        'question' => 'nullable|string',
        'level' => 'required|string',
        'candidate' => 'nullable|string',
        'product' => 'nullable|string',
        'category' => 'nullable|string',
        'template' => 'nullable|string',
        'version' => 'nullable|string',
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


}
