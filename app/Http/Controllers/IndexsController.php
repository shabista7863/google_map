<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//use Illuminate\Support\Facades\Storage; 
//use Session;
class IndexsController extends Controller
{
    public function videoInsert()
    {
        //$video = DB::table('video_uploaded')->where('id')->pluck('video');
        $videos = DB::table('video_uploaded')->select('*')->get();
      
        return view('reg/index')->with('videos',$videos);
    }




//  public function displayVideos($filename)
//    {
//       $path = storage_public('uploaded_videos/' . $filename);
//         if (!File::exists($path))
//          {
//             abort(404);
//          }

//       $file = File::get($path);

//       $type = File::mimeType($path);

//      $response = Response::make($file, 200);

//      $response->header("Content-Type", $type);

//      return $response;

//   }

}



