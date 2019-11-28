<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\ClassSubject;

class ClassSubjectController extends Controller
{
    //
    //Function to assign subjects to a class
    public function assignSubjects(Request $request)
    {
        if($request->isMethod('post'))
        {
            //validate user input
            $this->validate($request, [
                'subject_id' => 'required'
            ]);
            $data = $request->all(); //This gets all user inputs
            $subject_ids = $request->subject_id;//get all subject IDs submitted
            //get individual id and assign them to the class
            foreach($subject_ids as $subject_id){
                $class_subject = ClassSubject::insert([
                    'student_class_id' => $data['student_class_id'],
                    'subject_id' => $subject_id
                ]);
            }

            if($class_subject)
            {
                return redirect()->back()->with('success', 'Subject Assigned to class successfully');
            }else {
                return redirect()->back()->with('error', 'Unable to assign subjects to this class');
            }

        }
    }

    public function removeSubject($id)
    {
        $subject = ClassSubject::where(['subject_id'=>$id])->first();
        if($subject){
            $subject_id = $subject->subject_id;
            $the_id = ClassSubject::where(['subject_id'=>$subject_id])->first();
            //Finally delete it
            $the_id->delete();
            return redirect()->back()->with('success', 'Subject unassinged to teacher successfully');
        }else {
            return redirect()->back()->with('error', 'Unable to unassigned subject from teacher');
        }
    }
}
