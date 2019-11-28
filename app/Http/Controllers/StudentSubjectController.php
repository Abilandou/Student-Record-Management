<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentSubject;
// use App\StudentSubject;

class StudentSubjectController extends Controller
{
    //
    public function assignSubjects(Request $request)
    {
        if($request->isMethod('post'))
        {
            //validate user input
            $this->validate($request, [
                'subject_id' => 'required'
            ]);

            $data = $request->all();
            //get the subject ids
            $subject_ids = $request->subject_id;
            foreach($subject_ids as $subject_id){
                $student_subject = StudentSubject::insert([
                    'student_id' => $data['student_id'],
                    'subject_id' => $subject_id
                ]);
            }
            if($student_subject){
                return redirect()->back()->with('success', 'Subject added to student successfully');
            }else {
                return redirect()->back()->with('error', 'Unable to assign subject to student, possible internal error');
            }
        }
    }
    public function removeSubject($id)
    {
        $subject = StudentSubject::where(['subject_id'=>$id])->first();
        // dd($subject);
        if($subject){
            $subject_id = $subject->subject_id;
            $the_id = StudentSubject::where(['subject_id'=>$subject_id])->first();
            //Finally delete it
            $the_id->delete();
            return redirect()->back()->with('success', 'Subject unassinged to student successfully');
        }else {
            return redirect()->back()->with('error', 'Unable to unassigned subject from student');
        }
    }
}
