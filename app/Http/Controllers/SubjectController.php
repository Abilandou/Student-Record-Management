<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = Subject::all();
        return view('admin.subject/index')->with(compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.student/index');
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
            //Validate User input
            $this->validate($request, [
                'name' => 'required|min:3|max:30|unique:subjects|string',
                'coefficient' => 'required|integer',
                'type' => 'required'
            ]);

            $subject = Subject::create([
                'name' => $data['name'],
                'coefficient' => $data['coefficient'],
                'type' => $data['type'],
                'description' => $data['description']
            ]);
            if($subject)
            {
                return redirect('admin/subjects')->with('success', 'Subject '.$data['name'].' Added successfully');
            }else{
                return redirect()->back()->with('error', 'Could not add subject, possible internal error');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $subject = Subject::findOrFail($id);
        return view('admin.subject/show')->with(compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subject = Subject::findOrFail($id);
        return view('admin.subject/index')->with(compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->isMethod('put'))
        {
            $data = $request->all();

            //Validate user input
            $this->validate($request, [
                'name' => 'required|min:3|max:30|string',
                'coefficient' => 'required|integer',
                'type' => 'required'
            ]);

            $subject = Subject::where(['id'=>$id])->update([
                'name' => $data['name'],
                'coefficient' => $data['coefficient'],
                'type' => $data['type'],
                'description' => $data['description']
            ]);

            if($subject)
            {
                return redirect('admin/subjects')->with('success', 'Subject '.$data['name'].' Updated Successfully');
            }else {
                return redirect()->back()->with('error', 'Unable to update subject '.$data['name'].' Possible internal error');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $subject = Subject::where(['id'=>$id])->delete();
        if($subject)
        {
            return redirect('admin/subjects')->with('success', 'Subject deleted successfully');
        }else {
            return redirect()->back()->with('error', 'Unable to delete subject');
        }
    }
}
