<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class VideosController extends Controller
{
    public function dashboard()
        {
          session::get('name');  
          return view('reg/dashboard');
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
        return view('reg/video');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {
        $video_type = $request->input('video_type');
        $video_url  = $request->input('video_url');
        $price      = $request->input('price');
        $video      = $request->input('video');
        //dd($request->video);

        if($request->hasFile('video'))
        {
            //echo "video";
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            // $path =  public_path().'/uploaded_videos/';
            $path = storage_path('uploaded_videos');
            $file->move($path, $filename);
        }

        $data = array('video_type'=>$video_type, 'video_url'=>$video_url, 'price'=>$price, 'video'=>$filename,'users_id'=>Session::get('id'));
        DB::table('video_uploaded')->insert($data);
        $value = Session('key', 'You are successfully added all fields');
        return back()->with('success',$value);
     
        }
        
        public function validation(Request $request)
        {
            $this->validate($request, [
                'video_type' => 'required|min:2|max:50',
                'video_url' => 'required|unique:users',
                'price' => 'required|numeric',            
                'video' => 'required',                
            ], [
                'video_type.required' => 'VIdeo type is required',
                'video_type.min' => 'Name must be at least 2 characters.',
                'video_type.max' => 'Name should not be greater than 50 characters.',
            ]);
    
            //VideosController::insert($request);
             
           
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
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
        $users =  DB::table('video_uploaded')->where('id',$id)->get();
        return view('reg/video')->with('videoDetails',$users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //  DB::table('video_uploaded')
       // ->where ('id')
        // ->update(['video_type'=>$request['video_type'],'video_url'=>$request['video_url'], 'price'=>$request['price'], 'video'=>$request['video']
        // ]); 
        // return view('reg/video_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
       // DB::table('video_uploaded')->delete();
    }
        //VideosController::store($request);

        public function videolist()
        {
            //$request->session()->token();
            //$datas = Session::get('id');
            //$users =  DB::table('video_uploaded')->select('*')->where('users_id',Session::get('id'))->get();  
           // dd($users);

        //    $users =  DB::table('video_uploaded')->where('users_id',Session::get('id'))->get();
        //    return view('reg/video_list',['users'=> $users]);
            
            $users = DB::table('user_registers')             
            ->leftJoin('video_uploaded' , 'video_uploaded.users_id', '=', 'user_registers.id')
            ->select('user_registers.name', 'user_registers.email', 'user_registers.phone_no', 'video_uploaded.video_type', 'video_uploaded.video_url', 'video_uploaded.price')
             ->where('video_uploaded.users_id', '=', Session::get('id'))->paginate(2)
            ;
           // dd($users);
            return view('reg/video_list',compact('users', $users));
            
        }
}
