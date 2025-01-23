<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function add(Request $request)
{
    $rules = array(
        'name' => "required|min:2|max:20",
        'email' => "required|email",
    );

    $validation = Validator::make($request->all(), $rules);

    if ($validation->fails()) {
        return redirect('student')->withErrors($validation)->withInput();
    }

    $student = new Student();
    $student->name = $request->name;
    $student->email = $request->email;

    if ($student->save()) {
        return redirect('list')->with('success', 'Student added successfully.');
    } else {
        return redirect('student')->with('error', 'Failed to add student.');
    }
}


    public function list(){
        $studentd = Student::paginate(3);
        return view('liststudent',['students'=>$studentd]);
    }
    
    public function delete($id){
        $isdelete = Student::destroy($id  );
        if($isdelete){
            return redirect('list');
        }
        else{
            echo 'not deleted';
        }
    }
    public function edit($id){
        $student = Student::find($id);
        return view('editstudent',['edit'=>$student]);
    }

    public function editstudent(Request $request, $id){
        $student = student::find($id);
        $student->name = $request-> name;
        $student->email = $request-> email;
        $student->save();   
        if($student->save()){
            return redirect('list');
        }
        else{
            echo 'not updated';
        }
    }

    public function search(Request $request){
        $studentdata = Student::where('name'    , 'like','%$request->search%')->get();
        return view('liststudent',['students'=>$studentdata, 'searchvalue'=>$request->search]);
    }

    public function deleteall(Request $request){
        $result=Student::destroy($request->ids);
        if($result){
            return redirect('list');
        }
        else{
            echo 'not deleted';
        }
    }
}
