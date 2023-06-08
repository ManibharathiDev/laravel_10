<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentController extends Controller
{
    //

    //Retrieve All Data
    public function home()
    {
        //Select * from Students
        $student = Students::get();
        return view('home',compact('student'));
    }

    //Retrive specific data(We can filter by all columns)
    public function homeSearch($id)
    {
        $student = Students::get()
        ->where('age',$id);
        return view('home',compact('student'));
    }

    public function create(Request $request){
        $student = new Students();
        $student->name = $request->name;
        $student->age = $request->age;
        $student->dob = $request->dob;
        $student->mobile = $request->mobile;
        $student->email = $request->email;
        $student->save();

        $student = Students::get();
        return view('home',compact('student'));
    }
}
