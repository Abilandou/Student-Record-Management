<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeacherSubject;
use App\TeacherClass;

class TeacherSubjectController extends Controller
{
    //
    public function assignSubjects(Request $request){
        if($request->isMethod('post'))
        {
            //validate user input
            $this->validate($request, [
                'subject_id' => 'required'
            ]);
            $input = $request->all();

            //Get all selected subject IDs
            $subject_ids = $request->subject_id;
            //Check if the submited IDs is an array
            if(is_array($subject_ids)){
                //loop through the array, and assign all selected IDs against a single teacher ID
                foreach($subject_ids as $subject_id ){
                    TeacherSubject::insert([
                        'teacher_id' => $input['teacher_id'],
                        'subject_id' => $subject_id
                    ]);
                }
            }
            return redirect()->back()->with('success', 'Subjects assigned to teacher successfully');
        }else {
            return redirect()->back()->with('error', 'Could not process request possible internal error');
        }
    }

    public function assignClasses(Request $request)
    {
        if($request->isMethod('post'))
        {
            //Validate user inputs
            $this->validate($request, [
                'class_id' => 'required'
            ]);
            $data = $request->all();
            //Get all class IDs
            $class_ids = $request->class_id;
            foreach($class_ids as $class_id)
            {
                TeacherClass::insert([
                    'teacher_id' => $data['teacher_id'],
                    'class_id' => $class_id
                ]);
            }
            return redirect()->back()->with('success', 'Classes assigned to teacher successfully');
        }else {
            return redirect()->back()->with('error', 'Sorry could not assign classes to this teacher, check form method or possible internal error');
        }
    }

}
