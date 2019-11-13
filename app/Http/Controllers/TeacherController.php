<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Country;
use App\Subject;
use App\StudentClass;
use App\TeacherSubject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = Teacher::all();
        $countries = Country::all();
        $subjects = Subject::all();
        return view('admin.teacher/index')->with(compact('teachers', 'countries', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = Country::all();
        return view('admin.teacher/index')->with(compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->isMethod('post'))
        {
            $data = $request->all();

            //Validate user input
            $this->validate($request, [
                'full_name' => 'required|string|unique:teachers|min:3|max:30',
                'email' => 'required|email|unique:teachers',
                'address' => 'required|min:3|max:50',
                'phone' => 'required|unique:teachers|min:9',
                'country' => 'required|min:3'
            ]);

            $teacher = Teacher::create([
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'country' => $data['country'],
                'address' => $data['address']
            ]);

            if($teacher)
            {
                return redirect('admin/teachers')->with('success', 'Teacher '.$data['full_name'].' Added successfully');
            }else {
                return redirect()->back()->with('error', 'Unable to add teacher, possible internal error');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $teacher = Teacher::where(['id'=>$id])->first();
        $subjects = Subject::all();
        $classes = StudentClass::all();
        return view('admin.teacher/show')->with(compact('teacher', 'subjects', 'classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $teacher = Teacher::findOrFail($id);
        $countries = Country::all();
        return view('admin.teacher/index')->with(compact('teacher', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->isMethod('put'))
        {
            $data = $request->all();

            //Validate user inputs
            $this->validate($request, [
                'full_name' => 'required|string|min:3|max:30',
                'email' => 'required|email',
                'address' => 'required|min:3|max:50',
                'phone' => 'required|min:9',
                'country' => 'required|min:3'
            ]);

            $teacher = Teacher::where(['id'=>$id])->update([
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'country' => $data['country'],
                'address' => $data['address']
            ]);

            if($teacher)
            {
                return redirect('admin/teachers')->with('success', 'Teacher '.$data['full_name'].' Updated successfully');
            }else {
                return redirect()->back()->with('error', 'Unable to update teacher, possible internal error');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $teacher = Teacher::where(['id'=>$id])->delete();
        if($teacher)
        {
            return redirect('admin/teachers')->with('success', 'Teacher deleted successfully');
        }else {
            return redirect()->back()->with('error', 'Unable to delete teacher, possible internal error');
        }
    }

    public function assignSubjects(Request $request){
        if($request->isMethod('post'))
        {
            //validate user input
            $this->validate($request, [
                'subject_id' => 'required'
            ]);
            // $data = $request->all();
            // dd($data);

            // $teacher = TeacherSubject::insert([
            //     'teacher_id' => $data['teacher_id'],
            //     'subject_id' => $data['subject_id']
            // ]);
            $teacher = new TeacherSubject();
            $teacher->teacher_id = $request->input('teacher_id');
            $teacher->subject_id = $request->subject_id;
            $teacher->save();
            if($teacher){
                return redirect()->back()->with('success', 'Subjects assigned to teacher successfully');
            }else {
                return redirect()->back()->with('error', 'Failed to assign subjects to teacher, possible internal error');
            }
        }
        // return response()->json("This is actually shocking to me because things are not really ok");
        // $teacher = Teacher::where(['id'=>$id])->first();
        // if($teacher->count() > 0){
        //     return redirect('/admin/classes')->with('success','Assigning subjects to teachers is finally working.');
        // }
    }
}