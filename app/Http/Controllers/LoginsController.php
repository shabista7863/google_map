<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class LoginsController extends Controller
{
    public function signin()
    {
        return view('reg/signin');
    }

    public function view(Request $request)
    {
    $email = $request->input('email');
    $password = $request->input('password');
  
    LoginsController::validateLogin($request);
    $check=DB::table('user_registers')->where(['email'=>$email, 'password'=>$password])->first();
     // dd( count($check));
    
    if(count($check) > 0)
    {
        $request->session()->put('id', $check->id);
        $request->session()->put('name', $check->name);
        //echo session::get('id');
        //$request->session()->flash('error', 'Record successfully added!');
        return redirect('reg/dashboard')->with('alert-success', 'Successfully login details'); 
    }
    else
     {
        $request->session()->flash('error', 'Login failed');
        return Redirect::to('signin')->with('Incorrect login details');
     }
    }

    public function validateLogin(Request $request)
    {
        $this->validate($request,  [
             'email' => 'required', 
             'password' => 'required',
             
            ], [
                'email.required' => 'Name is required',
                'password.required' => 'password is required',

         ]);
         //LoginsController::view($request);
        //  $value = Session('key', 'You are successfully added all fields');
          //return back()->with('success',$value);
       
       
    }

    public function logout(Request $request) {
      $request->session()->flush();
        return redirect('signin');
      }
      


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
