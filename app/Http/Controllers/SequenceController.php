<?php

namespace App\Http\Controllers;

use App\Sequence;
use Illuminate\Http\Request;

class SequenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sequences = Sequence::all();
        if($sequences)
        {
            return view('admin.sequence/index')->with(compact('sequences'));
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
        return view('admin.sequence/index');
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
        if($request->isMethod('post')){
            //validate user data
            $this->validate($request, [
                'name' => 'required|min:3|unique:sequences'
            ]);

            $data = $request->all();
            $sequence = Sequence::insert([
                'name' => $data['name'],
                'description' => $data['description']
            ]);
            if($sequence){
                return redirect('admin/sequences')->with('success', 'Sequence added successfully');
            }else {
                return redirect()->back()->with('error', 'Unable to add sequence, possible internal error');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sequence  $sequence
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sequence  $sequence
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sequence = Sequence::where(['id'=>$id])->first();
        if($sequence){
            return view('admin.sequence/index')->with(compact('sequence'));
        }else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sequence  $sequence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->isMethod('put')){
            //validate user input
            $this->validate($request, [
                'name' => 'required|min:3'
            ]);
            $data = $request->all();
            $sequence = Sequence::where(['id'=>$id])->update([
                'name' => $data['name'],
                'description' => $data['description']
            ]);
            if($sequence){
                return redirect('admin/sequences')->with('success', 'Sequence updated successfully');
            }else {
                return redirect()->back()->with('error', 'Unable to update sequence, possible internal error');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sequence  $sequence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sequence = Sequence::where(['id'=>$id])->first();
        if($sequence){
            $sequence->delete();
            return redirect()->back()->with('success', 'Sequence deleted successfully');
        }else {
            return redirect()->back()->with('error', 'Unable to delete sequence, possible inernal error');
        }
    }
}
