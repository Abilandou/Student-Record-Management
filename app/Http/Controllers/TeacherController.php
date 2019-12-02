<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Country;
use App\Subject;
use App\StudentClass;
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
                'country' => 'required|min:3',
                'teacher_image' => 'mimes:jpg,jpeg,png,gif,svg'
            ]);

            $teacher = new Teacher();
            $teacher->full_name = $request->full_name;
            $teacher->email = $request->email;
            $teacher->address = $request->email;
            $teacher->phone = $request->phone;
            $teacher->country = $request->country;

            //Handle image upload for teacher
            if($request->hasFile('teacher_image')){
                // filename with extension
                $fileNameWithExt = $request->file('teacher_image')->getClientOriginalName();
                // filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                            
                 // extension
                 $extension = $request->file('teacher_image')->getClientOriginalExtension();
                 // filename to store
                 $fileNameToStore = $filename.'_'.time().'.'.$extension;

                 //storage folder
                 $folder = 'images/teachers';
                 // upload file
                 $path = $request->file('teacher_image')->move($folder, $fileNameToStore);
                $teacher->teacher_image = $path;
            }
            // dd($path);
            $teacher->save();
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
        //get all subjects that a single teacher teaches
        $subjects = Subject::all();
        $classes = StudentClass::all();

        return view('admin.teacher/show')->with(compact('teacher', 'classes', 'subjects'));
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
                'country' => 'required|min:3',
                'teacher_image' => 'mimes:jpg,jpeg,png,gif,svg'
            ]);

            if($request->hasFile('teacher_image')){
                // dd($request->file('teacher_image'));
                 // filename with extension
                 $fileNameWithExt = $request->file('teacher_image')->getClientOriginalName();
                 // filename
                 $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                 // extension
                 $extension = $request->file('teacher_image')->getClientOriginalExtension();
                 // filename to store
                 $fileNameToStore = $filename.'_'.time().'.'.$extension;

                 //storage folder
                 $folder = 'images/teachers';
                 // upload file
                 $path = $request->file('teacher_image')->move($folder, $fileNameToStore);
            }

            if(empty($path)){
                $the_image = Teacher::where(['id'=>$id])->first();
                $teacher_image = $the_image->teacher_image;
                $path = $teacher_image;
            }

            $teacher = Teacher::where(['id'=>$id])->update([
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'country' => $data['country'],
                'address' => $data['address'],
                'teacher_image' => $path
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

}
