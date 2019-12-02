<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Term;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $terms = Term::all();
        if($terms){
            return view('admin.term/index')->with(compact('terms'));
        }else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.term/index');
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
            //validate user data
            $this->validate($request, [
                'name' => 'required|min:3|unique:terms'
            ]);
            $data = $request->all();

            $term = Term::insert([
                'name' => $data['name'],
                'description' => $data['description']
            ]);
            if($term){
                return redirect('admin/terms')->with('success', 'Term added successfully');
            }else {
                return redirect()->back()->with('error', 'Unable to add term, possible internal error');
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $term = Term::where(['id'=>$id])->first();
        if($term){
            return view('admin.term/index')->with(compact('term'));
        }else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->isMethod('put')){
            //validate user inputs
            $this->validate($request, [
                'name' => 'required|min:3'
            ]);
            $data = $request->all();
            $term = Term::where(['id'=>$id])->update([
                'name' => $data['name'],
                'description' => $data['description']
            ]);
            if($data){
                return redirect('admin/terms')->with('success', 'Term added successfully');
            }else {
                return redirect()->back()->with('error', 'Unable to update term, possible internal error');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $term = Term::where(['id'=>$id])->first();
        if($term){
            $term->delete();
            return redirect()->back()->with('success', 'Term deleted successfully');
        }else {
            return redirect()->back()->with('error', 'Unable to delete this term, possible internal error');
        }
    }
}
