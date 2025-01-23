<?php

namespace App\Http\Controllers;

use App\Models\teststable;
use Illuminate\Http\Request;

class TestsTableControlller extends Controller
{
    public function teststable(){
        $tests= teststable::paginate(12); 
        return response()->json($tests);
    }

    public function delete($id)
{
    // Delete the record with the given ID
    $isdelete = teststable::destroy($id);

    // Check if the deletion was successful
    if ($isdelete) {
        // Fetch the updated data from the table after deletion
        $updatedTableData = teststable::all();

        // Return the updated table data as a JSON response
        return response()->json([
            'success' => true,
            'data' => $updatedTableData
        ]);
    } else {
        // Return an error message as a JSON response
        return response()->json([
            'success' => false,
            'message' => 'Record not deleted'
        ]);
    }
}

}
