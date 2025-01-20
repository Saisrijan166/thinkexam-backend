<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function add(Request $request){
        $student = new Student();
        $student->id = $request-> id;
        $student->name = $request-> name;
        $student->email = $request-> email;

        $result = $student ->save();
        if($result){
            echo "added to table";
            return redirect("list");
        }
        else{
            echo "not added ";
        }
    }

    public function list(){
        $studentd = Student::paginate(10);
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
