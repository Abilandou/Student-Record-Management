<?php

namespace App\Http\Controllers;

use App\StudentClass;
use Illuminate\Http\Request;
use App\Student;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes = StudentClass::all();
        return view('admin.class/index', ['classes' => $classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.class/index');
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
                'name' => 'required|unique:student_classes|min:3'
            ]);

            $class = StudentClass::create([
                'name' => $data['name'],
                'description' => $data['description']
            ]);
            if($class){
                return redirect('/admin/classes')->with('success', 'Class With Name: '.$data['name'].' Added Successfully');
            }else {
                return redirect('/admin/classes')->with('error', 'Sorry Could not add class'.$data['name'].'.');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        //
        $class = StudentClass::findOrFail($id);
        //get students of a single class
        $students = Student::where(['class_id'=>$id])->get();
        return view('admin.class/show')->with(compact('class', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function edit($id=null)
    {
        //
        $class = StudentClass::findOrFail($id);
        return view('admin.class/index')->with(compact('class'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=null)
    {
        // return view('admin.class/index');
        //
        if($request->isMethod('put'))
        {
            $data = $request->all();
            // $test = json_decode(json_encode($data));
            // echo "<pre>"; print_r($test); die;

            //Validate input
            $this->validate($request, [
                'name' => 'required|min:3',
            ]);

            $class = StudentClass::where(['id'=>$id])->update([
                'name' => $data['name'],
                'description' => $data['description']
            ]);
            
            if($class)
            {
                return redirect('admin/classes')->with('success', 'Class Updated Successfully');
            }else {
                return redirect()->back()->with('error', 'Unable to update class');
            }


        }
        // return view('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=null)
    {
        //
        // $class = StudentClass::findOrFail($id)->delete();
        $class = StudentClass::where(['id' => $id])->delete();
        if($class)
        {
            return redirect('/admin/classes')->with('success', 'Class deleted Successfully');
        }else{
            return redirect('/admin/classes')->with('error', 'Unable to delete class, system error');
        }
    }
}