<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;

class RegistersController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reg/signup');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function insert(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone_no = $request->input('phone_no');
        $password = $request->input('password');
        
        $data= array('name'=>$name, 'email'=>$email, 'phone_no'=>$phone_no, 'password'=>$password);
        DB::table('user_registers')->insert($data);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'phone_no' => 'required|numeric',            
            'password' => 'required|min:9',                
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name should not be greater than 50 characters.',
        ]);

        RegistersController::insert($request);
         $value = Session('key', 'You are successfully added all fields');
         return back()->with('success',$value);
       
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
    public function Profiledit($id)
    {
        $profile =  DB::table('user_registers')->where('id',$id)->get();
        return view('reg/profile')->with('profileDetails',$profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Profileupdate(Request $request)
    {
       
        DB::table('user_registers')
        ->where('id',Session::get('id'))
        ->update(['name'=>$request['name'],'email'=>$request['email'], 'phone_no'=>$request['phone_no'], 'password'=>$request['password']
        ]);
         
       // return view('reg/userProf');
        // $value = Session('key', 'You are updated successfully ');
        // return back()->with('success',$value);
    }

    public function validateProfile(Request $request)
    {
        $this->validate($request,  [
             'name' => 'required', 
             'email' => 'required',
             'phone_no' => 'required|max:10', 
             'password' => 'required|min:5',
             
            ], [
                'name.required' => 'Name is required',
                'email.required' => 'email is required',

         ]);
         $value = Session('key', 'You are updated successfully ');
         return back()->with('success',$value);
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
    }
}
