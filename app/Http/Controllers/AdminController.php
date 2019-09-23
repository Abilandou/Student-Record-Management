<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use Session;

class AdminController extends Controller
{
    //
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required','min:3','max:10','unique:admins'],
                'fullname' => ['requred','min:8','max:30','unique:admins'],
                'email' => ['required','email','unique:admins'],
                'password' => ['required','confirmed','min:8']
        ]);
    }

    public function adminRegister(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $here = json_decode(json_encode($data));
            // echo "<pre>"; print_r($here); die;

            $admin = Admin::create([
                'username' => $data['username'],
                'fullname' => $data['fullname'],
                'email' => $data['email'],
                'password' =>md5($data['password'])
            ]);

            if($admin){
                return redirect('/admin')->with('success', 'Admin registration Successful');
            }else {
                return redirect()->back()->with('error', 'Sorry Could not add administrator');
            }

        }
        return view('admin.admin_register');
    }

    public function adminLogin(Request $request)
    {

        if($request->isMethod('post'))
        {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            $data = $request->input();
            //Get admin data to login as administrator
            $adminCount = Admin::where([
                'email' => $data['email'],
                'password' => md5($data['password']),
                'admin' => 1
            ])->count();

            $admin = json_decode(json_encode($adminCount));
            // echo "<pre>"; print_r($admin); die;

            if($adminCount > 0) {
                //Make sure all access to dashboard passes through admin login
                Session::put('adminSession', $data['email']);
                return redirect('/admin/dashboard');
            }else {
                return redirect('/admin')->with('error', 'Invalid UserName of password');
            }
        }
        return view('admin.admin_login');
    }

    public function logout()
    {
       Session::flush();
        return redirect('/admin');
    }

    public function dashboard(){
        return view('dashboard');
    }

}
