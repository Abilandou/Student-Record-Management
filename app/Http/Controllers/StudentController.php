<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentClass;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Input;
use Image;
use App\ClassSubject;
use App\Subject;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        $classes = StudentClass::all();
        // $student_class = StudentClass::where('name', '%like%', 'student_class')->get();
        return view('admin.student/index')->with(compact('students', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //Return all studentClasses
        $classes = StudentClass::all();
        return view('admin.student/create')->with(compact('classes'));
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
            // dd($data);

            //Validate user input
            $this->validate($request, [
                'first_name' => 'required|min:3|string|max:20',
                'middle_name' => 'required|min:3|string|max:20',
                'last_name' => 'min:3|string|max:20',
                // 'full_name' => 'min:3|string|max:20|unique:students',
                'student_email' => 'unique:students|email',
                'place_of_birth' => 'required|string|min:3|max:100',
                'date_of_birth' => 'required|date',
                'student_phone' => 'min:9',
                'parent_phone' => 'required|min:9|max:30|unique:students',
                'student_address' => 'required|min:3|max:100',
                'parent_address' => 'required|min:3|max:100',
                'school_last_attended' => 'min:5|max:100',
                'class_id' => 'required|integer',
                'sex' => 'required',
                'student_image' => 'file'
            ]);

            //handle student file upload

            // if ($request->hasFile('student_image')) {
            //     // filename with extension
            //     $fileNameWithExt = $request->file('student_image')->getClientOriginalName();
            //     // filename
            //     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //     // extension
            //     $extension = $request->file('student_image')->getClientOriginalExtension();
            //     // filename to store
            //     $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //     $some_random = rand(111,9999);
            //     // dd($some_random);
            //     // upload file
            //     $path = $request->file('student_image')->storeAs('public/files', $fileNameToStore);
            //     // dd($path);
            // }
             //Upload Image
             if($request->hasFile('student_image')){
               $image_tmp = Input::file('student_image');
                if($image_tmp->isValid()){

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;

                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                    //Store image name in products table
                    // $product->image = $filename;



                }
            }

            $student = Student::insert([

                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'full_name' => $data['first_name'].' '.$data['middle_name'].' '.$data['last_name'],
                'student_email' => $data['student_email'],
                'place_of_birth' => $data['place_of_birth'],
                'date_of_birth' => $data['date_of_birth'],
                'student_phone' => $data['student_phone'],
                'parent_phone' => $data['parent_phone'],
                'student_address' => $data['student_address'],
                'parent_address' => $data['parent_address'],
                'school_last_attended' => $data['school_last_attended'],
                'class_id' => $data['class_id'],
                'sex' => $data['sex'],
                'student_image' => $filename

            ]);

            if($student)
            {
                return Redirect::to('/admin/students')->with('success', 'Student Added Successfully');
            }else {
                return redirect()->back()->with('error', 'Failed to Add student, possible internal error');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        //
        //display all students inorder to count them in the student individual pages
        $students = Student::all();
        $subjects = Subject::all();
        $student = Student::where(['id'=>$id])->first();
        $class_id = $student->class_id;
        $student_subjects = ClassSubject::where(['student_class_id'=>$class_id])->get();
        if($student){
            return view('admin.student/show')->with(compact('student', 'students', 'student_subjects', 'subjects'));
        }else {
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        //
        $student = Student::findOrFail($id);
        $classes = StudentClass::all();
        return view('admin.student/edit')->with(compact('student', 'classes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=null)
    {
        //
        if($request->isMethod('put'))
        {
            $data = $request->all();
            //Validate User data
            $this->validate($request, [
                'first_name' => 'required|min:3|string|max:20',
                'middle_name' => 'required|min:3|string|max:20',
                'last_name' => 'min:3|string|max:20',
                // 'full_name' => 'min:3|string|max:20|unique:students',
                'student_email' => 'email',
                'place_of_birth' => 'required|string|min:3|max:100',
                'date_of_birth' => 'required|date',
                'student_phone' => 'min:9',
                'parent_phone' => 'required|min:9|max:30',
                'student_address' => 'required|min:3|max:100',
                'parent_address' => 'required|min:3|max:100',
                'school_last_attended' => 'min:5|max:100',
                'class_id' => 'required|integer',
                'sex' => 'required',
                // 'student_image' => 'file'
            ]);

            $student = Student::where(['id'=>$id])->update([

                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'full_name' => $data['first_name'].' '.$data['middle_name'].' '.$data['last_name'],
                'student_email' => $data['student_email'],
                'place_of_birth' => $data['place_of_birth'],
                'date_of_birth' => $data['date_of_birth'],
                'student_phone' => $data['student_phone'],
                'parent_phone' => $data['parent_phone'],
                'student_address' => $data['student_address'],
                'parent_address' => $data['parent_address'],
                'school_last_attended' => $data['school_last_attended'],
                'class_id' => $data['class_id'],
                'sex' => $data['sex'],
            ]);

            if($student)
            {
                return redirect('/admin/students')->with('success', 'Student Updated Successfully');
            }else {
                return redirect()->back()->with('error', 'Failed to Edit student, possible internal error');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        //
        $student = Student::findOrFail($id)->delete();
        if($student)
        {
            return redirect()->back()->with('success', 'Student Deleted Successfully');
        }else {
            return redirect()->back()->with('error', 'Unable to delete student');
        }
    }

    public function class_student_search(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $student_class = $data['student_class'];
            $classes = StudentClass::all();

            $class_ids = Student::with('student_class')->pluck('class_id')->first();

            $class_name = StudentClass::where(['id'=>$class_ids])->pluck('name');

            $ret = json_decode(json_encode($class_name));
            // echo "<pre>"; print_r($ret); die;

            $students = Student::where($class_name, 'like', '%'.$student_class.'%')->get();
             return view('admin.student/index')->with(compact('students', 'classes'));
        }
    }
}
